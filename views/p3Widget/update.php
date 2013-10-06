<?php
$this->setPageTitle(
        Yii::t('p3WidgetsModule.model', 'P3 Widget')
        . ' - '
        . Yii::t('crud', 'Update')
        . ': '   
        . $model->getItemLabel()
);    
$this->breadcrumbs[Yii::t('p3WidgetsModule.model','P3 Widgets')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        
        <?php echo Yii::t('p3WidgetsModule.model','P3 Widget'); ?>
        <small>
            <?php echo Yii::t('crud','Update')?> #<?php echo $model->id ?>
        </small>
        
    </h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<?php
    $this->renderPartial('_form', array('model' => $model));
?>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>