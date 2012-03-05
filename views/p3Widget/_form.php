<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'p3-widget-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); 

echo $form->errorSummary($model);
?>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php #echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->dropDownList($model,'alias', $this->module->params['widgets'], array('onchange'=>'updateProperties()')); ?>
		<?php echo $form->error($model,'alias'); ?>
		<p class="hint">
		    Alias of the widget
		</p>
	</div>

<div class="row">
<?php echo $form->labelEx($model,'rank'); ?>
<?php echo $form->textField($model,'rank'); ?>
<?php echo $form->error($model,'rank'); ?>
<div class='hint'><?php if('hint.P3Widget.rank' != $hint = Yii::t('app', 'rank')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'containerId'); ?>
<?php echo $form->textField($model,'containerId',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'containerId'); ?>
<div class='hint'><?php if('hint.P3Widget.containerId' != $hint = Yii::t('app', 'containerId')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'moduleId'); ?>
<?php echo $form->textField($model,'moduleId',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'moduleId'); ?>
<div class='hint'><?php if('hint.P3Widget.moduleId' != $hint = Yii::t('app', 'moduleId')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'controllerId'); ?>
<?php echo $form->textField($model,'controllerId',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'controllerId'); ?>
<div class='hint'><?php if('hint.P3Widget.controllerId' != $hint = Yii::t('app', 'controllerId')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'actionName'); ?>
<?php echo $form->textField($model,'actionName',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'actionName'); ?>
<div class='hint'><?php if('hint.P3Widget.actionName' != $hint = Yii::t('app', 'actionName')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'requestParam'); ?>
<?php echo $form->textField($model,'requestParam',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'requestParam'); ?>
<div class='hint'><?php if('hint.P3Widget.requestParam' != $hint = Yii::t('app', 'requestParam')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'sessionParam'); ?>
<?php echo $form->textField($model,'sessionParam',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'sessionParam'); ?>
<div class='hint'><?php if('hint.P3Widget.sessionParam' != $hint = Yii::t('app', 'sessionParam')) echo $hint; ?></div>
</div>

<div class="row">
<label for="p3WidgetMeta"><?php echo Yii::t('app', 'P3WidgetMeta'); ?></label>
<?php if ($model->p3WidgetMeta !== null) echo $model->p3WidgetMeta->_label;; ?><br />
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('p3widget/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
