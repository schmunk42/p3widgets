<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'p3-widget-translation-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'enctype' => ''
            )
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span12">
            <h2>
                <?php echo Yii::t('P3WidgetsModule.crud','Data')?>                <small>
                    #<?php echo $model->id ?>                </small>

            </h2>


            <div class="form-horizontal">

                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.id')) != 'tooltip.id')?$t:'' ?>'>
                                <?php
                            $this->renderPartial('columns/id', array('model' => $model, 'form' => $form));
                            echo $form->error($model,'id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'p3_widget_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.p3_widget_id')) != 'tooltip.p3_widget_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model,'p3_widget_id',array('disabled'=>'disabled'));
                            echo $form->error($model,'p3_widget_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'status') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.status')) != 'tooltip.status')?$t:'' ?>'>
                                <?php
                            echo $form->dropDownList($model,'status',P3WidgetTranslation::optsstatus(),array('empty'=>'undefined'));;
                            echo $form->error($model,'status')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'language') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.language')) != 'tooltip.language')?$t:'' ?>'>
                                <?php
                            echo $form->dropDownList($model,'language',P3WidgetTranslation::optslanguage(),array('empty'=>'undefined'));;
                            echo $form->error($model,'language')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'properties_json') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.properties_json')) != 'tooltip.properties_json')?$t:'' ?>'>
                                <?php
                            $this->widget(
                'jsonEditorView.JuiJSONEditorInput',
                array(
                     'model'     => $model,
                     'attribute' => 'properties_json'
                )
            );;
                            echo $form->error($model,'properties_json')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'content_html') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.content_html')) != 'tooltip.content_html')?$t:'' ?>'>
                                <?php
                            $this->widget('CKEditor', array('model' => $model, 'attribute' => 'content_html', 'options' => Yii::app()->params['ext.ckeditor.options']));;
                            echo $form->error($model,'content_html')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php echo '<h3>Access</h3>' ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_owner') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.access_owner')) != 'tooltip.access_owner')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model,'access_owner',array('disabled'=>'disabled'));
                            echo $form->error($model,'access_owner')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_read') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.access_read')) != 'tooltip.access_read')?$t:'' ?>'>
                                <?php
                            echo $form->dropDownList($model,'access_read',P3WidgetTranslation::optsaccessread(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_read')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_update') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.access_update')) != 'tooltip.access_update')?$t:'' ?>'>
                                <?php
                            echo $form->dropDownList($model,'access_update',P3WidgetTranslation::optsaccessupdate(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_update')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_delete') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.access_delete')) != 'tooltip.access_delete')?$t:'' ?>'>
                                <?php
                            echo $form->dropDownList($model,'access_delete',P3WidgetTranslation::optsaccessdelete(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_delete')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'copied_from_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.copied_from_id')) != 'tooltip.copied_from_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model,'copied_from_id',array('disabled'=>'disabled'));
                            echo $form->error($model,'copied_from_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'created_at') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.created_at')) != 'tooltip.created_at')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model,'created_at',array('disabled'=>'disabled'));
                            echo $form->error($model,'created_at')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'updated_at') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.updated_at')) != 'tooltip.updated_at')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model,'updated_at',array('disabled'=>'disabled'));
                            echo $form->error($model,'updated_at')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                
            </div>
        </div>
        <!-- main inputs -->

            </div>
    <div class="row">
        
        <div class="span12"><!-- sub inputs -->
            <div class="well">
            <!--<h2>
                <?php echo Yii::t('P3WidgetsModule.crud','Relations')?>            </h2>-->
                                        </div>
        </div>
        <!-- sub inputs -->
    </div>

    <p class="alert">
        <?php echo Yii::t('P3WidgetsModule.crud','Fields with <span class="required">*</span> are required.');?>
    </p>

    <!-- TODO: We need the buttons inside the form, when a user hits <enter> -->
    <div class="form-actions" style="visibility: hidden; height: 1px">
        
        <?php
            echo CHtml::Button(
            Yii::t('P3WidgetsModule.crud', 'Cancel'), array(
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('p3WidgetTranslation/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('P3WidgetsModule.crud', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->