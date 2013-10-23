<?php
    $this->setPageTitle(
        Yii::t('P3WidgetsModule.model', 'P3 Widget')
        . ' - '
        . Yii::t('P3WidgetsModule.crud', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('P3WidgetsModule.model','P3 Widgets')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('P3WidgetsModule.crud', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('P3WidgetsModule.model','P3 Widget')?>
        <small>
            <?php echo $model->itemLabel ?>

        </small>

        </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>


<div class="row">
    <div class="span12">
        <h2>
            <?php echo Yii::t('P3WidgetsModule.crud','Data')?>            <small>
                #<?php echo $model->id ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                array(
                        'name' => 'id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'id',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name'=>'status',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3Widget::optsstatus(),
                                'attribute'=>'status',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'alias',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'alias',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'default_properties_json',
                        'type' => 'raw',
                        'value' => $model->default_properties_json
                    ),
array(
                        'name' => 'default_content_html',
                        'type' => 'raw',
                        'value' => $model->default_content_html
                    ),
array(
                        'name' => 'name_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'name_id',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'container_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'container_id',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'rank',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'rank',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'request_param',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'request_param',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'action_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'action_name',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'controller_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'controller_id',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'module_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'module_id',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'session_param',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'session_param',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'access_owner',
                        'type' => 'raw',
                        'value' => $model->access_owner
                    ),
array(
                        'name'=>'access_domain',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3Widget::optsaccessdomain(),
                                'attribute'=>'access_domain',
                                'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'access_read',
                        'type' => 'raw',
                        'value' => $model->access_read
                    ),
array(
                        'name' => 'access_update',
                        'type' => 'raw',
                        'value' => $model->access_update
                    ),
array(
                        'name' => 'access_delete',
                        'type' => 'raw',
                        'value' => $model->access_delete
                    ),
array(
                        'name' => 'copied_from_id',
                        'type' => 'raw',
                        'value' => $model->copied_from_id
                    ),
array(
                        'name' => 'created_at',
                        'type' => 'raw',
                        'value' => $model->created_at
                    ),
array(
                        'name' => 'updated_at',
                        'type' => 'raw',
                        'value' => $model->updated_at
                    ),
           ),
        )); ?>
    </div>

    </div>
    <div class="row">

    <div class="span12">
        <div class="well">
            <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>        </div>
    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>