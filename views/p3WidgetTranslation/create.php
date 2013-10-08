<?php
$this->setPageTitle(
    Yii::t('P3WidgetsModule.model', 'P3 Widget Translation')
    . ' - '
    . Yii::t('P3WidgetsModule.crud', 'Create')
);

$this->breadcrumbs[Yii::t('P3WidgetsModule.model', 'P3 Widget Translations')] = array('admin');
$this->breadcrumbs[] = Yii::t('P3WidgetsModule.crud', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('P3WidgetsModule.model', 'P3 Widget Translation'); ?>
        <small><?php echo Yii::t('P3WidgetsModule.crud', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>