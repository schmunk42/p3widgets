<?php
$this->breadcrumbs=array(
	$this->module->id => array('/'.$this->module->id),
	'Widgets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Widget', 'url'=>array('index')),
	array('label'=>'Create Widget', 'url'=>array('create')),
	array('label'=>'View Widget', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Widget', 'url'=>array('admin')),
);
?>

<h1>Update Widget <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>