<?php
/**
 * Class File
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2010 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * Description ...
 *
 * Detailed info
 * <pre>
 * $var = code_example();
 * </pre>
 * {@link DefaultController}
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @version $Id$
 * @package pii.cells
 * @since 2.0
 */

Yii::import('p3widgets.models.*');

class P3WidgetContainer extends CWidget {
    function  run() {
		parent::run();

		$criteria = new CDbCriteria();
		$criteria->condition = 'controllerId = "'.$this->controller->id.'" AND actionName = "'.$this->controller->action->id.'"';
		$models = Widget::model()->findAll($criteria);

		foreach($models AS $model) {
			$widget = new $model->path;
			foreach(CJSON::decode($model->properties) AS $property => $value) {
				$widget->$property = $value;
			}
			$widget->run();
		}

	}
}
?>
