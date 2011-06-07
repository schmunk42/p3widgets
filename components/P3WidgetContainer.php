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

	/**
	 * Defines $_GET parameter for widget queries
	 *
	 * @var string
	 */
	public $varyByRequestParam = null;

	/**
	 * Parameter for User checkAccess() to enable frontend editing,
	 * set to 'false' if you want to disable this feature
	 *
	 * @var string
	 */
	public $checkAccess = 'admin';


	function init() {
		parent::init();
		if (!$this->getId(false)) {
			throw new CException('Widget container must have an id.');
		}
	}

	/**
	 * Query widgets
	 */
	function run() {
		parent::run();

		// query widgets from database
		$widgetAttributes = array();
		$criteria = new CDbCriteria();
		$criteria->params = array(
			':controllerId' => $this->controller->id,
			':actionName' => $this->controller->action->id,
			':containerId' => $this->id,
		);
		$criteria->condition = 'controllerId = :controllerId AND actionName = :actionName AND containerId = :containerId';
		if ($this->varyByRequestParam !== null) {
			$criteria->condition .= ' AND requestParam = :requestParam';
			if (isset($_GET[$this->varyByRequestParam])) {
				$widgetAttributes['requestParam'] = $criteria->params[':requestParam'] = $_GET[$this->varyByRequestParam];
			} else {
				$criteria->params[':requestParam'] = null;
			}
		}
		$models = Widget::model()->findAll($criteria);

		// render widgets
		$widgets = "";
		foreach ($models AS $model) {
			$content = $this->prepareWidget($model->alias, CJSON::decode($model->properties), $model->content);

			if (($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)) {
				$widgets .= $this->render(
						'widget',
						array(
							'headline' => ((strrchr($model->alias, '.')) ? substr(strrchr($model->alias, '.'), 1) : $model->alias) . ' #' . $model->id,
							'content' => $content,
							'model' => $model),
						true);
			} else {
				$widgets .= $content;
			}
		}

		// render container (+widgets)
		if (($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)) {
			// prepare Widget model attributes for add button
			$widgetAttributes = CMap::mergeArray($widgetAttributes, array(
					'controllerId' => $this->controller->id,
					'actionName' => $this->controller->action->id,
					'containerId' => $this->id,
				));

			// include admin CSS and JS
			$cssFile = Yii::app()->assetManager->publish(Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.css');
			Yii::app()->clientScript->registerCssFile($cssFile);
			$jsFile = $this->renderInternal(Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.js', null, true);
			Yii::app()->clientScript->registerScript('P3WidgetContainer', $jsFile, CClientScript::POS_END);

			$this->render(
				'container',
				array(
					'widgets' => $widgets,
					'widgetAttributes' => $widgetAttributes,
				),
				false);
		} else {
			echo $widgets;
		}
	}

	/**
	 * Create widgets and apply properties
	 *
	 * @param <type> $alias
	 * @param <type> $properties
	 * @param <type> $content
	 * @return <type>
	 */
	private function prepareWidget($alias, $properties, $content) {
		try {
			$class = Yii::import($alias);
		} catch (Exception $e) {
			return "<div class='error'>{$e->getMessage()}'</div>";
		}
		// disabled error handling, otherwise this may break your application
		if (@class_exists($class) == true) {
			try {
				ob_start();
				$this->controller->beginWidget($class, $properties);
				echo $content;
				$this->controller->endWidget();
				$markup = ob_get_clean();
			} catch (Exception $e) {
				Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
				$markup = "<div class='notice'>" . $e->getMessage() . "</div>";
			}
			return $markup;
		} else {
			$msg = 'Widget \'' . $alias . '\' not found!';
			Yii::log($msg, CLogger::LEVEL_ERROR);
			return "<div class='flash-error'>" . $msg . "</div>";
		}
	}

}

?>
