<?php
/**
 * Class File
 * @author    Tobias Munk <schmunk@usrbin.de>
 * @link      http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2010 diemeisterei GmbH
 * @license   http://www.phundament.com/license/
 */
/**
 * Description ...
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
 * @package p3widgets
 * @since   3.0
 */
class P3WidgetsModule extends CWebModule
{

    public $adminRole = 'admin';

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(
            array(
                 'p3widgets.models.*',
                 'p3widgets.components.*',
            )
        );
    }

    public function buildWidgetMenuItems($widgetAttributes)
    {
        $items = array();
        foreach (Yii::app()->getModule('p3widgets')->params['widgets'] AS $alias => $name) {
            $widgetAttributes = CMap::mergeArray($widgetAttributes,array('alias'=>$alias,));
            $items[$name] = array(
                'label'       => $name,
                'url'         => array('/p3widgets/p3Widget/create', 'P3Widget' => $widgetAttributes, 'returnUrl' => Yii::app()->request->getUrl()),
                'htmlOptions' => array(
                    'class'                  => 'create-widget',
                    //'data-widget-attributes' => CJSON::encode($widgetAttributes)
                )
            );
        }
        return $items;
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else {
            return false;
        }
    }
}
