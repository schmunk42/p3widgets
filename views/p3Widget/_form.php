<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'p3-widget-form',
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
                            ;
                            echo $form->error($model,'id')
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
                            echo $form->dropDownList($model,'status',P3Widget::optsstatus(),array('empty'=>'undefined'));;
                            echo $form->error($model,'status')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'alias') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.alias')) != 'tooltip.alias')?$t:'' ?>'>
                                <?php
                            $this->renderPartial('columns/alias', array('model' => $model, 'form' => $form));
                            echo $form->error($model,'alias')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'default_properties_json') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.default_properties_json')) != 'tooltip.default_properties_json')?$t:'' ?>'>
                                <?php
                            $this->renderPartial('columns/default_properties_json', array('model' => $model, 'form' => $form));
                            echo $form->error($model,'default_properties_json')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'default_content_html') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.default_content_html')) != 'tooltip.default_content_html')?$t:'' ?>'>
                                <?php
                            $this->widget('CKEditor', array('model' => $model, 'attribute' => 'default_content_html', 'options' => Yii::app()->params['ext.ckeditor.options']));;
                            echo $form->error($model,'default_content_html')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'name_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.name_id')) != 'tooltip.name_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'name_id', array('size' => 60, 'maxlength' => 64));
                            echo $form->error($model,'name_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php echo '<h3>Position</h3>' ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'container_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.container_id')) != 'tooltip.container_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'container_id', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'container_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'rank') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.rank')) != 'tooltip.rank')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'rank');
                            echo $form->error($model,'rank')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'request_param') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.request_param')) != 'tooltip.request_param')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'request_param', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'request_param')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'action_name') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.action_name')) != 'tooltip.action_name')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'action_name', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'action_name')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'controller_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.controller_id')) != 'tooltip.controller_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'controller_id', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'controller_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'module_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.module_id')) != 'tooltip.module_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'module_id', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'module_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'session_param') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.session_param')) != 'tooltip.session_param')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'session_param', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'session_param')
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
                            <?php echo $form->labelEx($model, 'access_domain') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('P3WidgetsModule.model', 'tooltip.access_domain')) != 'tooltip.access_domain')?$t:'' ?>'>
                                <?php
                            echo $form->dropDownList($model,'access_domain',P3Widget::optsaccessdomain(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_domain')
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
                            echo $form->dropDownList($model,'access_read',P3Widget::optsaccessread(),array('empty'=>'undefined'));;
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
                            echo $form->dropDownList($model,'access_update',P3Widget::optsaccessupdate(),array('empty'=>'undefined'));;
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
                            echo $form->dropDownList($model,'access_delete',P3Widget::optsaccessdelete(),array('empty'=>'undefined'));;
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
                                            
                <h3>
                    <?php echo Yii::t('P3WidgetsModule.model', 'relation.P3WidgetTranslations'); ?>
                </h3>
                <?php echo '<i>'.Yii::t('P3WidgetsModule.crud','Switch to view mode to edit related records.').'</i>' ?>
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
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('p3Widget/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('P3WidgetsModule.crud', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->