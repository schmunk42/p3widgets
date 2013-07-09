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
    const UNIVERSAL_VALUE      = P3MetaDataBehavior::ALL_LANGUAGES;
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
        $criteria            = new CDbCriteria();
        $criteria->params    = array(
            ':universalValue' => self::UNIVERSAL_VALUE,
            ':moduleId'       => ($this->controller->module !== null) ? $this->controller->module->id : '',
            ':controllerId'   => $this->controller->id,
            ':actionName'     => $this->controller->action->id,
            ':containerId'    => $this->id,
            ':language'       => Yii::app()->language,
        );
        $criteria->condition = '(p3WidgetMeta.language = :language OR p3WidgetMeta.language = :universalValue) AND ' .
            '(moduleId = :moduleId OR moduleId = :universalValue) AND ' .
            '(controllerId = :controllerId OR controllerId = :universalValue) AND ' .
            '(actionName = :actionName OR actionName = :universalValue) AND ' .
            'containerId = :containerId';
        $criteria->with      = array('p3WidgetMeta');
        if ($this->varyByRequestParam !== null) {
            $criteria->condition .= ' AND (requestParam = :requestParam OR requestParam = :universalValue)';
            if (isset($_GET[$this->varyByRequestParam])) {
                $widgetAttributes['requestParam'] = $criteria->params[':requestParam'] = $_GET[$this->varyByRequestParam];
            } else {
                $criteria->params[':requestParam'] = '';
            }
        }

        $criteria->order = "rank ASC";

        $models = P3Widget::model()->findAll($criteria);
        Yii::trace("Found " . count($models) . " widgets.");

        // render widgets
        $widgets = "";

        $widgetAttributes = CMap::mergeArray(
            $widgetAttributes,
            array(
                 'moduleId'     => ($this->controller->module !== null) ?
                     $this->controller->module->id : '',
                 'controllerId' => $this->controller->id,
                 'actionName'   => $this->controller->action->id,
                 'containerId'  => $this->id,
            )
        );
        foreach ($models AS $model) {

            $properties = (is_array(CJSON::decode($model->t('properties', null, true)))) ?
                CJSON::decode($model->t('properties', null, true)) : array();

            $content = $this->prepareWidget($model->alias, $properties, $model->t('content', null, true));


            if (($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)) {
                if ($model->getTranslationModel() !== null) {

                } else {
                    // no translation
                    $content = "<div class='alert container-message'>Translation for widget #{$model->id} {$model->alias} not found.</div>" . $content;
                }
                // admin mode

                $widgets .= $this->render(
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
                $widgets .= $this->render(
                    'P3WidgetContainer.views.widgetDisplay',
                    array(
                         'content' => $content,
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
                     'widgets'          => $widgets,
                     'widgetAttributes' => $widgetAttributes,
                ),
                false
            );
        } else {
            $this->render(
                'containerDisplay',
                array(
                     'widgets' => $widgets,
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
                Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
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
                Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
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
            Yii::log($msg, CLogger::LEVEL_ERROR);
            restore_error_handler();

            return "<div class='flash-error'>" . $msg . "</div>";
        }
    }

    private function registerClientScripts()
    {
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
        Yii::app()->clientScript->registerScript('P3WidgetContainer', $jsFile, CClientScript::POS_END);
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

}

?>
