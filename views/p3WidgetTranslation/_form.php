<div class="form">
    <p class="note">
        <?php echo Yii::t('P3WidgetsModule.crud', 'Fields with');?> <span
            class="required">*</span> <?php echo Yii::t('P3WidgetsModule.crud', 'are required');?>        .
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                                                   'id' => 'p3-widget-translation-form',
                                                   'enableAjaxValidation' => true,
                                                   'enableClientValidation' => true,
                                              ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'language'); ?>

        <?php echo $form->textField($model, 'language', array('size' => 8, 'maxlength' => 8)); ?>
        <?php echo $form->error($model, 'language'); ?>
        <div class='hint'><?php if ('help.language' != $hint = Yii::t('P3WidgetsModule.crud', 'help.language')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row2">
        <?php echo $form->labelEx($model, 'properties'); ?>
        <?php echo CHtml::button('Reset Properties', array('onclick' => 'if (confirm("Reset all Properties?")) {resetProperties();}')); ?>
        <?php
        $this->widget('jsonEditorView.JuiJSONEditorInput', array(
                                                                'model' => $model,
                                                                // ActiveRecord, or any CModel child class
                                                                'attribute' => 'properties'
                                                                // Model attribute holding initial JSON data string
                                                           ));
        ?>
        <div class="notice">Do not use double quotes (") for keys and/or values!</div>
        <?php echo $form->error($model, 'properties'); ?>

    </div>

    <div class="row2">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php #echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
        <?php
        $this->widget(
            'ckeditor.CKEditor', array(
                                      'model' => $model,
                                      'attribute' => 'content',
                                      'options' => is_array(Yii::app()->params['ext.ckeditor.options']) ?
                                          Yii::app()->params['ext.ckeditor.options'] : array()
                                 )
        )
        ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <label for="p3Widget"><?php echo Yii::t('P3WidgetsModule.crud', 'P3Widget'); ?></label>
        <?php $this->widget(
        'Relation',
        array(
             'model' => $model,
             'relation' => 'p3Widget',
             'fields' => 'alias',
             'allowEmpty' => false,
             'style' => 'dropdownlist',
             'htmlOptions' => array(
                 'checkAll' => 'all'),
        )
    ); ?><br/>
    </div>


</div> <!-- form -->
<div class="form-actions">

    <?php
    echo CHtml::Button(Yii::t('P3WidgetsModule.crud', 'Cancel'), array(
                                                                      'submit' => array('p3widgettranslation/admin'),
                                                                      'class' => 'btn'
                                                                 ));
    echo ' ' . CHtml::submitButton(Yii::t('P3WidgetsModule.crud', 'Save'), array(
                                                                                'class' => 'btn btn-primary'
                                                                           ));
    $this->endWidget(); ?>
</div>


<script type="text/javascript">
    function resetProperties() {
        $("#P3WidgetTranslation_properties").jsoneditor('input');
        url = "<?php echo $this->createUrl('/p3widgets/p3Widget/classVars', array('alias' => '__ALIAS__')) ?>";
        url = url.replace("__ALIAS__", "<?php echo $model->p3Widget->alias; ?>");

        $.ajax(
                url,
                {
                    success:function (json) {
                        jQuery("#P3WidgetTranslation_properties").jsoneditor('input');
                        $("#P3WidgetTranslation_properties textarea").val(json);
                        $("#P3WidgetTranslation_properties").jsoneditor('init');
                        //alert(json);
                    }
                }

        );
    }

    <?php if (!$model->properties || $model->properties == "{}"): // {} == fallback, TODO? ?>
    $(document).ready(function () {
        resetProperties();
    });
        <?php endif; ?>

</script>