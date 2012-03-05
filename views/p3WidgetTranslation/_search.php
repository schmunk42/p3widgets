<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->textField($model,'id'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'p3_widget_id'); ?>
                <?php echo $form->dropDownList($model,'p3_widget_id',CHtml::listData(P3Widget::model()->findAll(), 'id', '_label'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'language'); ?>
                <?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'properties'); ?>
                <?php echo $form->textArea($model,'properties',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'content'); ?>
                <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
