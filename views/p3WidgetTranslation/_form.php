<div class="form">
	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'p3-widget-translation-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
		));

	echo $form->errorSummary($model);
	?>

	<?php echo "<p>" . $model->p3Widget->alias . "</p>"; ?>

    <div class="row">
		<?php echo $form->labelEx($model, 'language'); ?>
		<?php echo $form->textField($model, 'language', array('size' => 8, 'maxlength' => 8)); ?>
		<?php echo $form->error($model, 'language'); ?>
		<div class='hint'><?php if ('hint.P3WidgetTranslation.language' != $hint = Yii::t('app', 'language')) echo $hint; ?></div>
	</div>


	<div class="row2">
		<?php echo $form->labelEx($model, 'properties'); ?>
        <?php echo CHtml::button('Reset Properties', array('onclick'=>'if (confirm("Reset all Properties?")) {resetProperties();}')); ?>
		<?php
		$this->widget('ext.phundament.p3extensions.widgets.jsonEditorView.JuiJSONEditorInput', array(
			'model' => $model, // ActiveRecord, or any CModel child class
			'attribute' => 'properties' // Model attribute holding initial JSON data string
		));
		?><div class="notice">Do not use double quotes (") for keys and/or values!</div>
		<?php echo $form->error($model, 'properties'); ?>

	</div>

	<div class="row2">
		<?php echo $form->labelEx($model, 'content'); ?>
		<?php #echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php
		$this->widget(
			'ext.phundament.p3extensions.widgets.ckeditor.CKEditor', array(
			'model' => $model,
			'attribute' => 'content',
			'options' => is_array(Yii::app()->params['ext.ckeditor.options']) ? Yii::app()->params['ext.ckeditor.options'] : array()
			)
		)
		?>
		<?php echo $form->error($model, 'content'); ?>
	</div>

	<div class="row">
		<label for="p3Widget"><?php echo Yii::t('app', 'P3Widget'); ?></label>
		<?php
		$this->widget(
			'Relation', array(
			'model' => $model,
			'relation' => 'p3Widget',
			'fields' => '_label',
			'allowEmpty' => false,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => Yii::t('app', 'Choose all'),
			),)
		);
		?><br />
	</div>


	<?php
	echo CHtml::Button(Yii::t('app', 'Cancel'), array(
		'submit' => array('p3WidgetTranslation/admin')));
	echo CHtml::submitButton(Yii::t('app', 'Save'));
	$this->endWidget();
	?>
</div> <!-- form -->


<script type="text/javascript">
	function resetProperties() {
		$("#P3WidgetTranslation_properties").jsoneditor('input');
		url = "<?php echo $this->createUrl('/p3widgets/p3Widget/classVars', array('alias' => '__ALIAS__')) ?>";
		url = url.replace("__ALIAS__", "<?php echo $model->p3Widget->alias; ?>");

		$.ajax(
		url,
		{
			success: function(json){
				jQuery("#P3WidgetTranslation_properties").jsoneditor('input');
				$("#P3WidgetTranslation_properties textarea").val(json);
				$("#P3WidgetTranslation_properties").jsoneditor('init');
				//alert(json);
			}
		}

	);
	}

<?php if (!$model->properties || $model->properties == "{}"): // {} == fallback, TODO? ?>
		$(document).ready(function() {
			resetProperties();
		});
<?php endif; ?>

</script>