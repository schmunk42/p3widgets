<div class="widget" id="<?php echo P3WidgetContainer::WIDGET_CSS_PREFIX . $model->id ?>">
	<div class="admin-panel">
        <span><?php echo $headline ?></span>
		<div>
			<?php
			if (Yii::app()->user->checkAccess($model->p3WidgetMeta->checkAccessUpdate)) {
				if (!$model->t('properties')) {
					$this->widget('zii.widgets.jui.CJuiButton', array(
						'buttonType' => 'link',
						#'caption' => 'Translations',
						'url' => array('/p3widgets/p3WidgetTranslation/create', 'P3WidgetTranslation' => array('p3_widget_id' => $model->id, 'language' => Yii::app()->language), 'returnUrl' => Yii::app()->request->getUrl()),
						'name' => 'btnClick' . uniqid(),
						'options' => array('icons' => 'js:{primary:"ui-icon-plusthick"}'),
						'htmlOptions' => array(
							'title' => 'Create Widget Translation'
						)
						#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
					));
				} else {
					$this->widget('zii.widgets.jui.CJuiButton', array(
						'buttonType' => 'link',
						#'caption' => 'Translations',
						'url' => array('/p3widgets/p3WidgetTranslation/update', 'id' => $model->getTranslationModel()->id, 'returnUrl' => Yii::app()->request->getUrl()),
						'name' => 'btnClick' . uniqid(),
						'options' => array('icons' => 'js:{primary:"ui-icon-pencil"}'),
						#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
						'htmlOptions' => array(
							'title' => 'Update Widget Translation'
						)
					));
				}
				echo '<div class="handle">';
				$this->widget('zii.widgets.jui.CJuiButton', array(
					#'caption' => 'Move',
					'buttonType' => 'link',
					'name' => 'btnClick2' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-arrow-4"}'),
					#'onclick' => 'js:function(){alert("tbd: drag and drop"); this.blur(); return false;}',
					'htmlOptions' => array(
						'title' => 'Move Widget'
					)
				));
				echo '</div>';
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'buttonType' => 'link',
					#'caption' => 'View',
					'url' => array('/p3widgets/p3Widget/view', 'id' => $model->id, 'returnUrl' => Yii::app()->request->getUrl()),
					'name' => 'btnClick' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-document"}'),
					#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
					'htmlOptions' => array(
						'title' => 'View Widget Details'
					)
				));
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'buttonType' => 'link',
					#'caption' => 'Edit',
					'url' => array('/p3widgets/p3Widget/update', 'id' => $model->id, 'returnUrl' => Yii::app()->request->getUrl()),
					'name' => 'btnClick' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-wrench"}'),
					#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
					'htmlOptions' => array(
						'title' => 'Update Widget Details'
					)
				));
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'buttonType' => 'link',
					#'caption' => 'Meta Data',
					'url' => array('/p3widgets/p3WidgetMeta/update', 'id' => $model->id, 'returnUrl' => Yii::app()->request->getUrl()),
					'name' => 'btnClick' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-info"}'),
					#'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
					'htmlOptions' => array(
						'title' => 'Update Widget Meta Data'
					)
				));
			}
			if (Yii::app()->user->checkAccess($model->p3WidgetMeta->checkAccessDelete)) {
				$this->widget('zii.widgets.jui.CJuiButton', array(
					'id' => 'delete-' . $model->id,
					'buttonType' => 'link',
					#'caption' => 'Delete',
					'name' => 'btnClick3' . uniqid(),
					'options' => array('icons' => 'js:{primary:"ui-icon-close"}'),
					// onclick' => see container.js,
					'htmlOptions' => array(
						'title' => 'Delete Widget with all Translations',
                        'class' => 'delete'
					)
				));
			}
			?>
		</div>
	</div>
	<div class="content-panel">
			<?php echo $content; ?>
	</div>
</div>
