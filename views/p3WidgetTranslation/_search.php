<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php $this->renderPartial('columns/id', array('model' => $model, 'form' => $form)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'p3_widget_id'); ?>
        <?php echo $form->textField($model,'p3_widget_id',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->dropDownList($model,'status',P3WidgetTranslation::optsstatus(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'language'); ?>
        <?php echo $form->dropDownList($model,'language',P3WidgetTranslation::optslanguage(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'properties_json'); ?>
        <?php $this->widget(
                'jsonEditorView.JuiJSONEditorInput',
                array(
                     'model'     => $model,
                     'attribute' => 'properties_json'
                )
            );; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'content_html'); ?>
        <?php $this->widget('CKEditor', array('model' => $model, 'attribute' => 'content_html', 'options' => Yii::app()->params['ext.ckeditor.options']));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_owner'); ?>
        <?php echo $form->textField($model,'access_owner',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_read'); ?>
        <?php echo $form->dropDownList($model,'access_read',P3WidgetTranslation::optsaccessread(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_update'); ?>
        <?php echo $form->dropDownList($model,'access_update',P3WidgetTranslation::optsaccessupdate(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_delete'); ?>
        <?php echo $form->dropDownList($model,'access_delete',P3WidgetTranslation::optsaccessdelete(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'copied_from_id'); ?>
        <?php echo $form->textField($model,'copied_from_id',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_at'); ?>
        <?php echo $form->textField($model,'created_at',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'updated_at'); ?>
        <?php echo $form->textField($model,'updated_at',array('disabled'=>'disabled')); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('P3WidgetsModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
