<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'widget-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'properties'); ?>
		<?php #echo $form->textArea($model,'properties',array('rows'=>6, 'cols'=>50)); ?>
		<?php $this->widget('p3widgets.extensions.jsonEditorView.JuiJSONEditorInput', array(
   'model'=>$model, // ActiveRecord, or any CModel child class
   'attribute'=>'properties' // Model attribute holding initial JSON data string
)); ?>
		<?php echo $form->error($model,'properties'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rank'); ?>
		<?php echo $form->textField($model,'rank'); ?>
		<?php echo $form->error($model,'rank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contiainerId'); ?>
		<?php echo $form->textField($model,'contiainerId',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'contiainerId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moduleId'); ?>
		<?php echo $form->textField($model,'moduleId',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'moduleId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'controllerId'); ?>
		<?php echo $form->textField($model,'controllerId',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'controllerId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actionName'); ?>
		<?php echo $form->textField($model,'actionName',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'actionName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requestParam'); ?>
		<?php echo $form->textField($model,'requestParam',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'requestParam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sessionParam'); ?>
		<?php echo $form->textField($model,'sessionParam',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'sessionParam'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->