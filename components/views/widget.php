<div class="widget" id="<?php echo P3WidgetContainer::WIDGET_CSS_PREFIX . $model->id ?>">
	<div class="admin-panel">
		<?php
		$this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType' => 'link',
			'url' => array('/p3widgets/widget/update', 'id' => $model->id),
			'name' => 'btnClick' . uniqid(),
			'options' => array('icons' => 'js:{primary:"ui-icon-wrench"}'),
			#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
		));
		echo '<div class="handle">';
		$this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType' => 'link',
			'name' => 'btnClick2' . uniqid(),
			'options' => array('icons' => 'js:{primary:"ui-icon-arrow-4"}'),
			#'onclick' => 'js:function(){alert("tbd: drag and drop"); this.blur(); return false;}',
		));
		echo '</div>';
		$this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType' => 'link',
			'name' => 'btnClick3' . uniqid(),
			'options' => array('icons' => 'js:{primary:"ui-icon-close"}'),
			'onclick' => "js:function(){
				if (confirm('Are you sure?')) {
					widgetId = ".$model->id.";
					msg = 'Deleting widget #'+widgetId;
					console.log(msg);
                    url = ' ".Yii::app()->controller->createUrl("/p3widgets/widget/delete", array("id"=>"_ID_"))."';
				    $.post(
						url.replace(/_ID_/,widgetId),
						{Widget:{id:widgetId}},
						function(data){
							if(data.search(/<h1>Manage Widgets/i) != -1) {
								alert(msg+' - OK');
								$('#widget-".$model->id."').hide();
							} else {
								alert(msg+' - Error');
							}
						}
					);
					return true;
				} else {
					return false;
				}
				}",
		));
		?>
		<!--<h1>Widget</h1>-->
	</div>
	<div class="content-panel">
		<?php echo $content; ?>
	</div>
</div>
