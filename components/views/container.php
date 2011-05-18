	<div id="<?php echo P3WidgetContainer::CONTAINER_CSS_PREFIX . $this->id ?>" class="widget-container admin">
		<div class="header">
			<h1>Container <?php echo $this->id ?></h1>
		<?php
		$this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType' => 'link',
			'url' => array('/p3widgets/widget/create', 'Widget' => array('controllerId]' => $this->controller->id, 'actionName' => $this->controller->action->id, 'containerId' => $this->id)),
			'name' => 'btnClick' . uniqid(),
			'options' => array('icons' => 'js:{primary:"ui-icon-plus"}'),
			#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
		));
		?>

	</div>

	<?php echo $widgets ?>

	</div>
