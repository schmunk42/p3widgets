<?php
$this->setPageTitle(
        Yii::t('P3WidgetsModule.model', 'P3 Widget Translation')
        . ' - '
        . Yii::t('P3WidgetsModule.crud', 'Update')
        . ': '   
        . $model->getItemLabel()
);    
$this->breadcrumbs[Yii::t('P3WidgetsModule.model','P3 Widget Translations')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('P3WidgetsModule.crud', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        
        <?php echo Yii::t('P3WidgetsModule.model','P3 Widget Translation'); ?>
        <small>
            <?php echo $model->itemLabel ?>

        </small>

        
    </h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<?php
    $this->renderPartial('_form', array('model' => $model));
?>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>