<div class="form">

	<?php echo CHtml::hiddenField('returnUrl',Yii::app()->request->getParam('returnUrl')); ?>
	
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'p3-widget-meta-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); 

echo $form->errorSummary($model);
?>

	<div class="row">
<?php echo $form->labelEx($model,'status'); ?>
<?php echo $form->textField($model,'status'); ?>
<?php echo $form->error($model,'status'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.status' != $hint = Yii::t('app', 'status')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'type'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.type' != $hint = Yii::t('app', 'type')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'language'); ?>
<?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
<?php echo $form->error($model,'language'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.language' != $hint = Yii::t('app', 'language')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'treeParent_id'); ?>
<?php echo $form->textField($model,'treeParent_id'); ?>
<?php echo $form->error($model,'treeParent_id'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.treeParent_id' != $hint = Yii::t('app', 'treeParent_id')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'treePosition'); ?>
<?php echo $form->textField($model,'treePosition'); ?>
<?php echo $form->error($model,'treePosition'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.treePosition' != $hint = Yii::t('app', 'treePosition')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'begin'); ?>
<?php echo $form->textField($model,'begin'); ?>
<?php echo $form->error($model,'begin'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.begin' != $hint = Yii::t('app', 'begin')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'end'); ?>
<?php echo $form->textField($model,'end'); ?>
<?php echo $form->error($model,'end'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.end' != $hint = Yii::t('app', 'end')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'keywords'); ?>
<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'keywords'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.keywords' != $hint = Yii::t('app', 'keywords')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'customData'); ?>
<?php echo $form->textArea($model,'customData',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'customData'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.customData' != $hint = Yii::t('app', 'customData')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'label'); ?>
<?php echo $form->textField($model,'label'); ?>
<?php echo $form->error($model,'label'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.label' != $hint = Yii::t('app', 'label')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'owner'); ?>
<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'owner'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.owner' != $hint = Yii::t('app', 'owner')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessCreate'); ?>
<?php echo $form->textField($model,'checkAccessCreate',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessCreate'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.checkAccessCreate' != $hint = Yii::t('app', 'checkAccessCreate')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessRead'); ?>
<?php echo $form->textField($model,'checkAccessRead',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessRead'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.checkAccessRead' != $hint = Yii::t('app', 'checkAccessRead')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessUpdate'); ?>
<?php echo $form->textField($model,'checkAccessUpdate',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessUpdate'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.checkAccessUpdate' != $hint = Yii::t('app', 'checkAccessUpdate')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessDelete'); ?>
<?php echo $form->textField($model,'checkAccessDelete',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessDelete'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.checkAccessDelete' != $hint = Yii::t('app', 'checkAccessDelete')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdAt'); ?>
<?php echo $form->textField($model,'createdAt'); ?>
<?php echo $form->error($model,'createdAt'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.createdAt' != $hint = Yii::t('app', 'createdAt')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdBy'); ?>
<?php echo $form->textField($model,'createdBy',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'createdBy'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.createdBy' != $hint = Yii::t('app', 'createdBy')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedAt'); ?>
<?php echo $form->textField($model,'modifiedAt'); ?>
<?php echo $form->error($model,'modifiedAt'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.modifiedAt' != $hint = Yii::t('app', 'modifiedAt')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedBy'); ?>
<?php echo $form->textField($model,'modifiedBy',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'modifiedBy'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.modifiedBy' != $hint = Yii::t('app', 'modifiedBy')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'guid'); ?>
<?php echo $form->textField($model,'guid',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'guid'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.guid' != $hint = Yii::t('app', 'guid')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'ancestor_guid'); ?>
<?php echo $form->textField($model,'ancestor_guid',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'ancestor_guid'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.ancestor_guid' != $hint = Yii::t('app', 'ancestor_guid')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'model'); ?>
<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'model'); ?>
<div class='hint'><?php if('hint.P3WidgetMeta.model' != $hint = Yii::t('app', 'model')) echo $hint; ?></div>
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('p3WidgetMeta/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
