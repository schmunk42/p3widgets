<?php
$this->breadcrumbs['P3 Widgets'] = array('index');$this->breadcrumbs[] = $model->_label;
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

<h1><?php echo Yii::t('app', 'View');?> P3Widget #<?php echo $model->id; ?></h1>

<?php echo CHtml::link('Widget Page',array("/".$model->controllerId."/".$model->actionName)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		'alias',
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
<ul><?php $foreignobj = $model->p3WidgetMeta; 

					if ($foreignobj !== null) {
					echo '<li>';
					echo '#'.$model->p3WidgetMeta->id.' ';
					echo CHtml::link($model->p3WidgetMeta->_label, array('/p3widgets/p3WidgetMeta/view','id'=>$model->p3WidgetMeta->id));
							
					echo ' '.CHtml::link(Yii::t('app','Update'), array('/p3widgets/p3WidgetMeta/update','id'=>$model->p3WidgetMeta->id), array('class'=>'edit'));

					
					
					}
					?></ul><p><?php if($model->p3WidgetMeta === null) echo CHtml::link(
				Yii::t('app','Create'),
				array('/p3widgets/p3WidgetMeta/create', 'P3WidgetMeta' => array('id'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p><h2><?php echo CHtml::link(Yii::t('app','P3WidgetTranslations'), array('/p3widgets/p3WidgetTranslation/admin'));?></h2>
<ul>
			<?php if (is_array($model->p3WidgetTranslations)) foreach($model->p3WidgetTranslations as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->_label, array('/p3widgets/p3WidgetTranslation/view','id'=>$foreignobj->id));
							
					echo ' '.CHtml::link(Yii::t('app','Update'), array('/p3widgets/p3WidgetTranslation/update','id'=>$foreignobj->id), array('class'=>'edit'));

					}
						?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('/p3widgets/p3WidgetTranslation/create', 'P3WidgetTranslation' => array('p3_widget_id'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p>