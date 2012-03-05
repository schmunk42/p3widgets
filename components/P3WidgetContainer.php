<?php

/**
 * Class File
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2010 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */
Yii::import('p3widgets.models.*');

/**
 * Component which dynamically creates widgets
 * 
 * UNIVERSAL_VALUE will be always selected
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
 * @package p3widgets.components
 * @since 3.0
 */
class P3WidgetContainer extends CWidget {
	const CONTAINER_CSS_PREFIX = 'container-';
	const WIDGET_CSS_PREFIX = 'widget-';
	const UNIVERSAL_VALUE = "_ALL";

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
	public $checkAccess = 'P3widgets.Widget.*';

	/**
	 * Wheter to render the controls on top or on bottom of the container
	 * @var type 
	 */
	public $controlPosition = 'top';

	function init() {
		parent::init();
		if (!$this->getId(false)) {
			throw new CException("Widget container must have an 'id' attribute.");
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
			':universalValue' => self::UNIVERSAL_VALUE,
			':moduleId' => ($this->controller->module !== null) ? $this->controller->module->id : '',
			':controllerId' => $this->controller->id,
			':actionName' => $this->controller->action->id,
			':containerId' => $this->id,
			':language' => Yii::app()->language,
		);
		$criteria->condition = '(p3WidgetMeta.language = :language OR p3WidgetMeta.language = :universalValue) AND ' .
			'(moduleId = :moduleId OR moduleId = :universalValue) AND ' .
			'(controllerId = :controllerId OR controllerId = :universalValue) AND ' .
			'(actionName = :actionName OR actionName = :universalValue) AND ' .
			'containerId = :containerId';
		$criteria->with = array('p3WidgetMeta');
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
		Yii::trace("Found ".count($models)." widgets.");
		
		// render widgets
		$widgets = "";
		foreach ($models AS $model) {
						
			$properties = (is_array(CJSON::decode($model->t('properties')))) ? CJSON::decode($model->properties) : array();
			$content = $this->prepareWidget($model->alias, $properties, $model->t('content',null,true));

			if (($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)) {
				// admin mode
				$widgets .= $this->render(
					'widget', array(
					'headline' => ((strrchr($model->alias, '.')) ? substr(strrchr($model->alias, '.'), 1) : $model->alias) . ' #' . $model->id,
					'content' => $content,
					'model' => $model), true);
			} else {
				$widgets .= $content;
			}
		}

		// render container (+widgets)
		if (($this->checkAccess === false) || Yii::app()->user->checkAccess($this->checkAccess)) {
			// prepare Widget model attributes for add button
			$widgetAttributes = CMap::mergeArray($widgetAttributes, array(
					'moduleId' => ($this->controller->module !== null) ? $this->controller->module->id : null,
					'controllerId' => $this->controller->id,
					'actionName' => $this->controller->action->id,
					'containerId' => $this->id,
				));

			$this->registerClientScripts();

			$this->render(
				'container', array(
				'widgets' => $widgets,
				'widgetAttributes' => $widgetAttributes,
				), false);
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
			return "<div class='flash-error'>{$e->getMessage()}'</div>";
		}

		if (@class_exists($class) == true) {
			try {
				// instantiate widget with properties
				ob_start();
				$this->controller->beginWidget($class, $properties);
				$beginWidget = ob_get_clean();
			} catch (Exception $e) {
				ob_end_clean();
				Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
				$markup = "<div class='flash-warning'>" . $e->getMessage() . "</div>";
				if (Yii::app()->user->checkAccess($this->checkAccess)) {
					return $markup;
				} else {
					return null;
				}
			}
			ob_start();
			echo $content;
			$this->controller->endWidget();
			return $beginWidget . ob_get_clean();
		} else {
			$msg = 'Widget \'' . $alias . '\' not found!';
			Yii::log($msg, CLogger::LEVEL_ERROR);
			return "<div class='flash-error'>" . $msg . "</div>";
		}
	}

	private function registerClientScripts() {
		// include admin CSS and JS
		$cssFile = Yii::app()->assetManager->publish(Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.css');
		Yii::app()->clientScript->registerCssFile($cssFile);
		$jsFile = $this->renderInternal(Yii::getPathOfAlias('p3widgets.themes.default') . DIRECTORY_SEPARATOR . 'container.js', null, true);
		Yii::app()->clientScript->registerScript('P3WidgetContainer', $jsFile, CClientScript::POS_END);
	}

}

?>
