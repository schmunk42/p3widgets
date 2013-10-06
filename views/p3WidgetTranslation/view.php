<?php
    $this->setPageTitle(
        Yii::t('p3WidgetsModule.model', 'P3 Widget Translation')
        . ' - '
        . Yii::t('crud', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('p3WidgetsModule.model','P3 Widget Translations')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('p3WidgetsModule.model','P3 Widget Translation')?>
    <small><?php echo Yii::t('crud','View')?> #<?php echo $model->id ?></small>
    </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>


<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('crud','Data')?>            <small>
                <?php echo $model->itemLabel?>            </small>
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
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'p3_widget_id',
            'value' => ($model->p3Widget !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->p3Widget->itemLabel,
                            array('/p3widgets/p3Widget/view','id' => $model->p3Widget->id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/p3widgets/p3Widget/update','id' => $model->p3Widget->id),
                            array('class' => '')):'n/a',
            'type' => 'html',
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
                                'source' => P3WidgetTranslation::optsstatus(),
                                'attribute'=>'status',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name'=>'language',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3WidgetTranslation::optslanguage(),
                                'attribute'=>'language',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'properties_json',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'properties_json',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'content_html',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'content_html',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'access_owner',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'access_owner',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name'=>'access_read',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3WidgetTranslation::optsaccessread(),
                                'attribute'=>'access_read',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name'=>'access_update',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3WidgetTranslation::optsaccessupdate(),
                                'attribute'=>'access_update',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name'=>'access_delete',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3WidgetTranslation::optsaccessdelete(),
                                'attribute'=>'access_delete',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'copied_from_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'copied_from_id',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'created_at',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'created_at',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'updated_at',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'updated_at',
                                'url' => $this->createUrl('/p3widgets/p3WidgetTranslation/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>