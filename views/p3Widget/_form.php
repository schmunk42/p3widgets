<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'p3-widget-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span7"> <!-- main inputs -->
            <h2>
                <?php echo Yii::t('crud','Data')?>                <small>
                    <?php echo $model->itemLabel ?>
                </small>

            </h2>


            <div class="form-horizontal">

                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <?php
                            ;
                            echo $form->error($model,'id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.id')) != 'help.id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'status') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'status',P3Widget::optsstatus(),array('empty'=>'undefined'));;
                            echo $form->error($model,'status')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.status')) != 'help.status')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'alias') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->renderPartial('columns/alias', array('model' => $model, 'form' => $form));
                            echo $form->error($model,'alias')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.alias')) != 'help.alias')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'default_properties_json') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->renderPartial('columns/default_properties_json', array('model' => $model, 'form' => $form));
                            echo $form->error($model,'default_properties_json')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.default_properties_json')) != 'help.default_properties_json')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'default_content_html') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget('CKEditor', array('model' => $model, 'attribute' => 'default_content_html', 'options' => Yii::app()->params['ext.ckeditor.options']));;
                            echo $form->error($model,'default_content_html')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.default_content_html')) != 'help.default_content_html')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'name_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'name_id', array('size' => 60, 'maxlength' => 64));
                            echo $form->error($model,'name_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.name_id')) != 'help.name_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'container_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'container_id', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'container_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.container_id')) != 'help.container_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'rank') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'rank');
                            echo $form->error($model,'rank')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.rank')) != 'help.rank')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'request_param') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'request_param', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'request_param')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.request_param')) != 'help.request_param')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'session_param') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'session_param', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'session_param')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.session_param')) != 'help.session_param')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'action_name') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'action_name', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'action_name')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.action_name')) != 'help.action_name')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'controller_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'controller_id', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'controller_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.controller_id')) != 'help.controller_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'module_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'module_id', array('size' => 60, 'maxlength' => 128));
                            echo $form->error($model,'module_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.module_id')) != 'help.module_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_owner') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'access_owner',array('disabled'=>'disabled'));
                            echo $form->error($model,'access_owner')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.access_owner')) != 'help.access_owner')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_domain') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_domain',P3Widget::optsaccessdomain(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_domain')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.access_domain')) != 'help.access_domain')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_read') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_read',P3Widget::optsaccessread(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_read')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.access_read')) != 'help.access_read')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_update') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_update',P3Widget::optsaccessupdate(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_update')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.access_update')) != 'help.access_update')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_delete') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_delete',P3Widget::optsaccessdelete(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_delete')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.access_delete')) != 'help.access_delete')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'copied_from_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'copied_from_id',array('disabled'=>'disabled'));
                            echo $form->error($model,'copied_from_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.copied_from_id')) != 'help.copied_from_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'created_at') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'created_at',array('disabled'=>'disabled'));
                            echo $form->error($model,'created_at')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.created_at')) != 'help.created_at')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'updated_at') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'updated_at',array('disabled'=>'disabled'));
                            echo $form->error($model,'updated_at')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3WidgetsModule.model', 'help.updated_at')) != 'help.updated_at')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- main inputs -->

        <div class="span5"> <!-- sub inputs -->
            <h2>
                <?php echo Yii::t('crud','Relations')?>
            </h2>
                                            
                <h3>
                    <?php echo Yii::t('p3WidgetsModule.model', 'P3WidgetTranslations'); ?>
                </h3>
                <?php echo '<i>'.Yii::t('crud','Switch to view mode to edit related records.').'</i>' ?>
                            
        </div>
        <!-- sub inputs -->
    </div>

    <p class="alert">
        <?php echo Yii::t('crud','Fields with <span class="required">*</span> are required.');?>
    </p>

    <?php $this->endWidget() ?>
</div> <!-- form -->