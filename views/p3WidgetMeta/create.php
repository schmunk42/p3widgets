<?php
$this->breadcrumbs['P3 Widget Metas'] = array('admin');
$this->breadcrumbs[] = Yii::t('P3WidgetsModule.crud', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('P3WidgetsModule.crud', 'P3 Widget Meta'); ?> <small><?php echo Yii::t('P3WidgetsModule.crud', 'Create'); ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$this->renderPartial('_form', array(
'model' => $model,
'buttons' => 'create'));

?>

