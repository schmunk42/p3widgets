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
	const CONTAINER_CSS_PREFIX = 'container-';
	const WIDGET_CSS_PREFIX = 'widget-';

	function run() {
		parent::run();

		$cssFile = Yii::app()->assetManager->publish(Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.css');
		Yii::app()->clientScript->registerCssFile($cssFile);
		
		$jsFile = $this->renderInternal(Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.js', null, true);
		Yii::app()->clientScript->registerScript('P3WidgetContainer',$jsFile, CClientScript::POS_END);

		$criteria = new CDbCriteria();
		$criteria->condition = 'controllerId = :controllerId AND actionName = :actionName AND containerId = :containerId';
		$criteria->params = array(
			':controllerId' => $this->controller->id,
			'actionName' => $this->controller->action->id,
			'containerId' => $this->id,
		);
		$models = Widget::model()->findAll($criteria);

		$widgets = "";
		foreach ($models AS $model) {
			$content = $this->prepareWidget($model->alias, CJSON::decode($model->properties));

			if (Yii::app()->user->checkAccess('admin')) {
				$widgets .= $this->render('widget', array('content' => $content, 'model' => $model), true);
			} else {
				$widgets .= $content;
			}
		}

		if (Yii::app()->user->checkAccess('admin')) {
			$this->render('container', array('widgets' => $widgets), false);
		} else {
			echo $widgets;
		}
	}

	private function prepareWidget($alias, $properties) {
		$class = Yii::import($alias);
		if (@class_exists($class) == true) {
			$widget = Yii::createComponent($alias);
			ob_start();
			foreach ($properties AS $property => $value) {
				try {
					$widget->$property = $value;
				} catch (Exception $e) {
					Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
					echo "<div class='flash-notice'>Widget has no property '{$property}'</div>";
				}
			}
			$widget->run();
			$markup = ob_get_clean();
			return $markup;
		} else {
			$msg = 'Widget \'' . $alias . '\' not found!';
			Yii::log($msg, CLogger::LEVEL_ERROR);
			return "<div class='flash-error'>" . $msg . "</div>";
		}
	}

}

?>
