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
