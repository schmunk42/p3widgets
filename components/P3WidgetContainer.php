<?php

/**
 * Class File
 * @author    Tobias Munk <schmunk@usrbin.de>
 * @link      http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2010 diemeisterei GmbH
 * @license   http://www.phundament.com/license/
 */
Yii::setPathOfAlias('P3WidgetContainer', dirname(__FILE__));
Yii::import('p3widgets.models.*');

/**
 * Component which dynamically creates widgets
 * UNIVERSAL_VALUE will be always selected
 * Detailed info
 * <pre>
 * <?php
 *     $this->widget(
 *         'p3widgets.components.P3WidgetContainer',
 *         array(
 *             'id'=>'main',
 *             #'checkAccess'=>false //disables checkAccess feature
 *             )
 *     );
 * ?>
 * </pre>
 * {@link DefaultController}
 * @author  Tobias Munk <schmunk@usrbin.de>
 * @version $Id$
 * @package p3widgets.components
 * @since   3.0
 */
class P3WidgetContainer extends CWidget
{

    const CONTAINER_CSS_PREFIX = 'container-';
    const WIDGET_CSS_PREFIX    = 'widget-';
    const UNIVERSAL_VALUE      = PhAccessBehavior::ALL_DOMAINS;
    const PLACEHOLDER          = '{WIDGET_CONTENT}';

    /**
     * Defines $_GET parameter for widget queries
     * @var string
     */
    public $varyByRequestParam = null;

    /**
     * Parameter for User checkAccess() to enable frontend editing,
     * set to 'false' if you want to disable this feature.
     *
     * Note: You can only restrict access to a certain container **in the frontend** with this option!
     * @var string
     */
    public $checkAccess = 'P3widgets.Widget.*';

    /**
     * Wheter to render the controls on 'top' or on 'bottom' of the container
     * @var type
     */
    public $controlPosition = 'top';

    function init()
    {
        parent::init();
        if (!$this->getId(false)) {
            throw new CException("Widget container must have an 'id' attribute.");
        }
    }

    /**
     * Query widgets
     */
    function run()
    {
        parent::run();

        // query widgets from database
        $widgetAttributes    = array();
        $cacheId = $this->getCacheId();
        $cachedItems = Yii::app()->cache->get($cacheId);
        if ($cachedItems !== false) {
            $models = $cachedItems;
        } else {
            $criteria            = new CDbCriteria();
            $criteria->params    = array(
                ':universalValue' => self::UNIVERSAL_VALUE,
                ':moduleId'       => ($this->controller->module !== null) ? $this->controller->module->id : '',
                ':controllerId'   => $this->controller->id,
                ':actionName'     => $this->controller->action->id,
                ':containerId'    => $this->id,
                ':domain'       => Yii::app()->language,
            );
            $criteria->condition = '(access_domain = :domain OR access_domain = :universalValue) AND ' .
                '(module_id = :moduleId OR module_id = :universalValue) AND ' .
                '(controller_id = :controllerId OR controller_id = :universalValue) AND ' .
                '(action_name = :actionName OR action_name = :universalValue) AND ' .
                'container_id = :containerId';
            if ($this->varyByRequestParam !== null) {
                $criteria->condition .= ' AND (request_param = :requestParam OR request_param = :universalValue)';
                if (isset($_GET[$this->varyByRequestParam])) {
                    $widgetAttributes['request_param'] = $criteria->params[':requestParam'] = $_GET[$this->varyByRequestParam];
                } else {
                    $criteria->params[':requestParam'] = '';
                }
            }

            $criteria->order = "rank ASC";

            $models = P3Widget::model()->findAll($criteria);
            Yii::app()->cache->set($cacheId, $models, 0, $this->getCacheDependency());
        }

        Yii::trace("Container '{$this->id}' has " . count($models) . " widget(s).", "p3widgets.components.P3WidgetContainer");
        $widgetAttributes = CMap::mergeArray(
            $widgetAttributes,
            array(
                 'module_id'     => ($this->controller->module !== null) ?
                     $this->controller->module->id : '',
                 'controller_id' => $this->controller->id,
                 'action_name'   => $this->controller->action->id,
                 'container_id'  => $this->id,
            )
        );

        // render widgets
        $container = "";
        foreach ($models AS $model) {
            $properties = (is_array(CJSON::decode($model->properties_json))) ?
                CJSON::decode($model->properties_json) : array();
            $widget = $this->prepareWidget($model->alias, $properties, $model->content_html);

            // admin mode
            if (($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)) {
                /*$content = "<div class='container-message'>";
                $statusClass = 'label-'.$model->statusCssClass;
                $content .= "<span class='label {$statusClass}'>Widget</span> ";
                if (!$model->translationModel->isNewRecord) {
                    $translationStatusClass = 'label-'.$model->statusCssClass;
                    $content .= "<span class='label {$translationStatusClass}'>Translation</span> ";
                }
                $content .= "</div>";
*/
                $content = "";
                $content .= $widget;

                $container .= $this->render(
                    'P3WidgetContainer.views.widget',
                    array(
                         'headline'         => ((strrchr($model->alias, '.')) ?
                             substr(strrchr($model->alias, '.'), 1) :
                             $model->alias) . ' #' . $model->id,
                         'content'          => $content,
                         'widgetAttributes' => $widgetAttributes,
                         'model'            => $model
                    ),
                    true
                );
            } else {

                $container .= $this->render(
                    'P3WidgetContainer.views.widgetDisplay',
                    array(
                         'content' => $widget,
                         'model'   => $model
                    ),
                    true
                );
            }
        }




        // render container (+widgets)
        if (($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)) {
            // prepare Widget model attributes for add button


            $this->registerClientScripts();

            $this->render(
                'container',
                array(
                     'widgets'          => $container,
                     'widgetAttributes' => $widgetAttributes,
                ),
                false
            );
        } else {
            $this->render(
                'containerDisplay',
                array(
                     'widgets' => $container,
                     //'widgetAttributes' => $widgetAttributes,
                ),
                false
            );
        }
    }

    /**
     * Create widgets and apply properties
     *
     * @param  <type> $alias
     * @param  <type> $properties
     * @param  <type> $content
     *
     * @return <type>
     */
    private function prepareWidget($alias, $properties, $content)
    {
        try {
            $class = Yii::import($alias);
        } catch (Exception $e) {
            return "<div class='flash-error'>{$e->getMessage()}'</div>";
        }

        set_error_handler(array($this, 'handleError'));
        if (class_exists($class) == true) {
            try {
                // special handling for NULL values
                $parsedProperties = array();
                foreach ($properties AS $key => $value) {
                    if ($value == "NULL") {
                        $parsedProperties[$key] = null;
                    } else {
                        $parsedProperties[$key] = $value;
                    }
                }

                // instantiate widget with properties
                ob_start();
                $this->controller->beginWidget($class, $parsedProperties);
                $beginWidget = ob_get_clean();
            } catch (Exception $e) {
                ob_end_clean();
                restore_error_handler();
                Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, "p3widgets.components.P3WidgetContainer");
                $markup = "<div class='flash-warning'>Exception on beginWidget(): " . $e->getMessage() . "</div>";
                if (Yii::app()->user->checkAccess($this->checkAccess)) {
                    return $markup;
                } else {
                    return null;
                }
            }

            ob_start();
            try {
                if (strstr($content, self::PLACEHOLDER)) {
                    $this->controller->endWidget();
                    $widget = $beginWidget . ob_get_clean();
                    $return = str_replace(self::PLACEHOLDER, $widget, $content);
                } else {
                    $this->controller->endWidget();
                    $return = $beginWidget . $content . ob_get_clean();
                }
            } catch (Exception $e) {
                ob_end_clean();
                restore_error_handler();
                Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, "p3widgets.components.P3WidgetContainer");
                $markup = "<div class='flash-warning'>Exception on endWidget(): " . $e->getMessage() . "</div>";
                if (Yii::app()->user->checkAccess($this->checkAccess)) {
                    return $markup;
                } else {
                    return null;
                }
            }

            restore_error_handler();

            return $return;
        } else {
            $msg = 'Widget \'' . $alias . '\' not found!';
            Yii::log($msg, CLogger::LEVEL_ERROR, "p3widgets.components.P3WidgetContainer");
            restore_error_handler();

            return "<div class='flash-error'>" . $msg . "</div>";
        }
    }

    private function registerClientScripts()
    {
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('cookie'); // for disabled / enabled state
        $cs->registerCoreScript('jquery.ui');

        // include admin CSS and JS
        $cssFile = Yii::app()->assetManager->publish(
            Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.css'
        );
        Yii::app()->clientScript->registerCssFile($cssFile);
        $jsFile = $this->renderInternal(
            Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.js',
            null,
            true
        );
        Yii::app()->clientScript->registerScript('P3WidgetContainer', $jsFile, CClientScript::POS_READY);

    }

    public function handleError($errno, $errstr, $errfile, $errline)
    {
        if (Yii::app()->user->checkAccess($this->checkAccess)) {


            if (!(error_reporting() & $errno)) {
                // This error code is not included in error_reporting
                return;
            }
            switch ($errno) {
                case E_WARNING:
                case E_USER_WARNING:
                case E_NOTICE:
                case E_USER_NOTICE:
                    echo "<div class='flash-warning'> [$errno] $errstr</div>\n";

                    return true;
                    break;
                default:
                    echo "<div class='flash-error'> [$errno] $errstr</div>\n";

                    return false;
                    break;
            }
            /* Don't execute PHP internal error handler */
        } else {
            // do not output errors for non-admins -- TODO?
            return true;
        }
    }

    private function getCacheDependency(){
        $depFile = new CFileCacheDependency(__FILE__);
        $depUpdate = new CDbCacheDependency("SELECT MAX(p3_widget_meta.modifiedAt) FROM p3_widget_meta");
        $depUpdateTranslation = new CDbCacheDependency("SELECT MAX(p3_widget_translation.modifiedAt) FROM p3_widget_translation");
        $depDelete = New CGlobalStateCacheDependency('p3extensions.behaviors.P3MetaDataBehavior:lastDelete:p3_widget');
        $dependency = new CChainedCacheDependency(array($depFile, $depUpdate, $depUpdateTranslation, $depDelete));
        return $dependency;
    }

    private function getCacheId()
    {
        $id = Yii::app()->language.':';
        $id .= ($this->controller->module !== null) ? $this->controller->module->id : '*';
        $id .= ':'.$this->controller->id .':'. $this->controller->action->id .':'. $this->id;
        $id .= ':'.(($this->varyByRequestParam !== null) ? Yii::app()->request->getParam($this->varyByRequestParam) : '*');
        $id .= ':'.(($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)?'admin':'display');
        return 'p3widgets.components.P3WidgetContainer:'.$id;
    }
}

?>
