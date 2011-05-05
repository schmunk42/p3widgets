<?php
$this->breadcrumbs=array(
	$this->module->id => array('/'.$this->module->id),
	'Widgets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Widget', 'url'=>array('index')),
	array('label'=>'Manage Widget', 'url'=>array('admin')),
);
?>

<h1>Create Widget</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>