<div id="<?php echo P3WidgetContainer::CONTAINER_CSS_PREFIX . $this->id ?>" class="widget-container admin controlPosition<?php echo ucfirst($this->controlPosition) ?>">
	<div class="header">
		<h1>Container <?php echo $this->id ?> [<span class="cssClasses"></span>]</h1>			
		<?php
		$this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType' => 'link',
			#'caption'=>'Create',
			'url' => array('/p3widgets/p3Widget/create', 'P3Widget' => $widgetAttributes, 'returnUrl' => Yii::app()->request->getUrl()),
			'name' => 'btnClick' . uniqid(),
			'options' => array('icons' => 'js:{primary:"ui-icon-plus"}'),
			'htmlOptions' => array(
				'title' => 'Create Widget'
			)
		));
		?>

	</div>

	<?php echo $widgets ?>

</div>