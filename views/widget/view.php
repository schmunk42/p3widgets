<?php
$this->breadcrumbs=array(
	$this->module->id => array('/'.$this->module->id),
	'Widgets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Widget', 'url'=>array('index')),
	array('label'=>'Create Widget', 'url'=>array('create')),
	array('label'=>'Update Widget', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Widget', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Widget', 'url'=>array('admin')),
);
?>

<h1>View Widget #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alias',
		'properties',
		'content',
		'rank',
		'containerId',
		'moduleId',
		'controllerId',
		'actionName',
		'requestParam',
		'sessionParam',
	),
)); ?>


	<h2><?php echo CHtml::link(Yii::t('app','P3WidgetMeta'), array('/p3widgets/p3WidgetMeta/admin'));?></h2>
<ul><?php $foreignobj = $model->metaData; 

					if ($foreignobj !== null) {
					echo '<li>';
					echo '#'.$model->metaData->id.' ';
					echo CHtml::link($model->metaData->_label, array('/p3widgets/p3WidgetMeta/view','id'=>$model->metaData->id));
							
					echo ' '.CHtml::link(Yii::t('app','Update'), array('/p3widgets/p3WidgetMeta/update','id'=>$model->metaData->id), array('class'=>'edit'));

					
					
					}
					?></ul><p><?php if($model->metaData === null) echo CHtml::link(
				Yii::t('app','Create'),
				array('/p3widgets/p3WidgetMeta/create', 'P3WidgetMeta' => array('id'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p>