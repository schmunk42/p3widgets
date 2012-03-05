<?php
$this->breadcrumbs['P3 Widget Translations'] = array('index');$this->breadcrumbs[] = $model->_label;
if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
	array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
	/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo Yii::t('app', 'View');?> P3WidgetTranslation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		array(
			'name'=>'p3_widget_id',
			'value'=>($model->p3Widget !== null)?CHtml::link($model->p3Widget->_label, array('/p3widgets/p3Widget/view','id'=>$model->p3Widget->id)).' '.CHtml::link(Yii::t('app','Update'), array('/p3widgets/p3Widget/update','id'=>$model->p3Widget->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
		),
		'language',
		'properties',
		'content',
),
	)); ?>


	