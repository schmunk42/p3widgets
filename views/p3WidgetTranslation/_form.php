<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'p3-widget-translation-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    )); 

echo $form->errorSummary($model);
?>

    <div class="row">
<?php echo $form->labelEx($model,'language'); ?>
<?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
<?php echo $form->error($model,'language'); ?>
<div class='hint'><?php if('hint.P3WidgetTranslation.language' != $hint = Yii::t('app', 'language')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'properties'); ?>
<?php echo $form->textArea($model,'properties',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'properties'); ?>
<div class='hint'><?php if('hint.P3WidgetTranslation.properties' != $hint = Yii::t('app', 'properties')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'content'); ?>
<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'content'); ?>
<div class='hint'><?php if('hint.P3WidgetTranslation.content' != $hint = Yii::t('app', 'content')) echo $hint; ?></div>
</div>

<div class="row">
<label for="p3Widget"><?php echo Yii::t('app', 'P3Widget'); ?></label>
<?php $this->widget(
                    'Relation',
                    array(
                            'model' => $model,
                            'relation' => 'p3Widget',
                            'fields' => '_label',
                            'allowEmpty' => false,
                            'style' => 'dropdownlist',
                            'htmlOptions' => array(
                                'checkAll' => Yii::t('app', 'Choose all'),
                                ),)
                        ); ?><br />
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
            'submit' => array('p3widgettranslation/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->