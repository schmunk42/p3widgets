<?php
$this->breadcrumbs[Yii::t('P3WidgetsModule.crud', 'Translations')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('P3WidgetsModule.crud', 'Widgets'); ?>
    <small><?php echo Yii::t('P3WidgetsModule.crud', 'Translation'); ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<h2>
    <?php echo Yii::t('P3WidgetsModule.crud', 'Data'); ?>
</h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
            'id',
        array(
            'name'=>'p3_widget_id',
            'value'=>($model->p3Widget !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->p3Widget->alias, array('p3Widget/view','id'=>$model->p3Widget->id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        'language',
        'properties',
        'content',
),
        )); ?></p>


<h2>
    <?php echo Yii::t('P3WidgetsModule.crud', 'Relations'); ?>
</h2>

<div class='row'>
</div>
