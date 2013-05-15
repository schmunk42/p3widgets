<?php
$this->breadcrumbs[Yii::t('P3WidgetsModule.crud', 'P3 Widget Meta')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('P3WidgetsModule.crud', 'P3 Widget Meta'); ?> <small>View #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<h2>
    <?php echo Yii::t('P3WidgetsModule.crud', 'Data'); ?>
</h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
            array(
            'name'=>'id',
            'value'=>($model->id0 !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->id0->alias, array('p3Widget/view','id'=>$model->id0->id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        'status',
        'type',
        'language',
        array(
            'name'=>'treeParent_id',
            'value'=>($model->treeParent !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->treeParent->status, array('p3WidgetMeta/view','id'=>$model->treeParent->id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        'treePosition',
        'begin',
        'end',
        'keywords',
        'customData',
        'label',
        'owner',
        'checkAccessCreate',
        'checkAccessRead',
        'checkAccessUpdate',
        'checkAccessDelete',
        'createdAt',
        'createdBy',
        'modifiedAt',
        'modifiedBy',
        'guid',
        'ancestor_guid',
        'model',
),
        )); ?></p>


<h2>
    <?php echo Yii::t('P3WidgetsModule.crud', 'Relations'); ?>
</h2>

<div class='row'>
</div>
<div class='row'>
</div>
<div class='row'>
<div class='span3'><?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>Yii::t('P3WidgetsModule.crud', 'Meta Data'), 'icon'=>'icon-list-alt', 'url'=> array('p3WidgetMeta/admin')),
                array('icon'=>'icon-plus', 'url'=>array('p3WidgetMeta/create', 'P3WidgetMeta' => array('treeParent_id'=>$model->{$model->tableSchema->primaryKey}))),
        ),
    )); ?></div><div class='span8'>
<?php
    echo '<span class=label>CHasManyRelation</span>';
    if (is_array($model->p3WidgetMetas)) {

        echo CHtml::openTag('ul');
            foreach($model->p3WidgetMetas as $relatedModel) {

                echo '<li>';
                echo CHtml::link($relatedModel->status, array('p3WidgetMeta/view','id'=>$relatedModel->id), array('class'=>''));

                echo '</li>';
            }
        echo CHtml::closeTag('ul');
    }
?></div>
</div>
