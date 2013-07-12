<div class="form">
    <p class="note">
        <?php echo Yii::t('P3WidgetsModule.crud', 'Fields with'); ?> <span
            class="required">*</span> <?php echo Yii::t('P3WidgetsModule.crud', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget(
        'CActiveForm',
        array(
             'id'                     => 'p3-widget-translation-form',
             'enableAjaxValidation'   => true,
             'enableClientValidation' => true,
        )
    );

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <div class="span3">
            <?php echo $form->labelEx($model, 'language'); ?>

            <?php echo $form->textField($model, 'language', array('size' => 8, 'maxlength' => 8)); ?>
            <?php echo $form->error($model, 'language'); ?>
            <div class='hint'>
                <?php if ('help.language' != $hint = Yii::t('P3WidgetsModule.crud', 'help.language')) {
                    echo $hint;
                } ?></div>
        </div>
        <div class="span6">

            <label>Widget Alias</label>

            <p><?php echo CHtml::value($model, 'p3Widget.alias') ?> </p>
        </div>
        <div class="span3 pull-right">
            <?php echo $form->labelEx($model, 'media'); ?>
            <?php
            $this->widget(
                'bootstrap.widgets.TbButton',
                array(
                     'label'       => Yii::t('P3WidgetsModule.crud', 'Upload Files'),
                     //'url' => array('/p3media/import/uploadPopup'),
                     'htmlOptions' => array(
                         'class'   => 'btn-primary',
                         'onclick' => 'window.open("' . $this->createUrl(
                             '/p3media/import/uploadPopup'
                         ) . '", "Upload", "width=800,height=800");',
                         'target'  => '_blank'
                     )
                )
            );
            ?>

        </div>
    </div>

    <hr/>

    <div class="row">

        <?php echo $form->labelEx($model, 'content'); ?>

        <?php
        $this->widget(
            'ckeditor.CKEditor',
            array(
                 'model'     => $model,
                 'attribute' => 'content',
                 'options'   => is_array(Yii::app()->params['ext.ckeditor.options']) ?
                     Yii::app()->params['ext.ckeditor.options'] : array()
            )
        )
        ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'properties'); ?>
        <?php echo CHtml::button(
            Yii::t('P3WidgetsModule.crud', 'Reset'),
            array(
                 'onclick' => 'if (confirm("' . Yii::t(
                     'P3WidgetsModule.crud',
                     'Reset all Properties?'
                 ) . '")) {resetProperties();}'
            )
        ); ?>
        <?php
        $this->widget(
            'jsonEditorView.JuiJSONEditorInput',
            array(
                 'model'     => $model,
                 // ActiveRecord, or any CModel child class
                 'attribute' => 'properties'
                 // Model attribute holding initial JSON data string
            )
        );
        ?>
        <div class="notice"><?php echo Yii::t(
                'P3WidgetsModule.crud',
                'Do not use double quotes (") for keys and/or values!'
            ); ?></div>
        <?php echo $form->error($model, 'properties'); ?>

        <div class='hint'><?php if ('help.properties' != $hint = Yii::t('P3WidgetsModule.crud', 'help.properties')) {
                echo $hint;
            } ?></div>

    </div>

    <!-- TODO -->
    <div class="row hide">
        <label for="p3Widget"><?php echo Yii::t('P3WidgetsModule.crud', 'P3Widget'); ?></label>
        <?php $this->widget(
            'Relation',
            array(
                 'model'       => $model,
                 'relation'    => 'p3Widget',
                 'fields'      => '_label',
                 'allowEmpty'  => false,
                 'style'       => 'dropdownlist',
                 'htmlOptions' => array(
                     'checkAll' => 'all'
                 ),
            )
        );
        ?><br/>
    </div>


    <div class="form-actions">

        <?php
        echo CHtml::Button(
            Yii::t('P3WidgetsModule.crud', 'Cancel'),
            array(
                 'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] :
                     array('p3WidgetTranslation/admin'),
                 'class'  => 'btn'
            )
        );
        echo ' ' . CHtml::submitButton(
                Yii::t('P3WidgetsModule.crud', 'Save'),
                array(
                     'class' => 'btn btn-primary'
                )
            );
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div> <!-- form -->


<script type="text/javascript">
    function resetProperties() {
        $("#P3WidgetTranslation_properties").jsoneditor('input');
        url = "<?php echo $this->createUrl('/p3widgets/p3Widget/classVars',
        array('alias' => '__ALIAS__')) ?>";
        url = url.replace("__ALIAS__", "<?php echo CHtml::value($model,'p3Widget.alias'); ?>");

        $.ajax(
            url,
            {
                success: function (json) {
                    jQuery("#P3WidgetTranslation_properties").jsoneditor('input');
                    $("#P3WidgetTranslation_properties textarea").val(json);
                    $("#P3WidgetTranslation_properties").jsoneditor('init');
                    //alert(json);
                }
            }

        );
    }


    <?php if (!$model->properties || $model->properties == "{}"): // {} == fallback, TODO? ?>
    <!-- new widget -->
    $(document).ready(function () {
        resetProperties();
    });
    <?php endif; ?>

</script>