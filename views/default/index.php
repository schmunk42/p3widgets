<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<h1>Widgets
    <small><?php echo Yii::t('P3WidgetsModule.crud', 'Overview'); ?></small>
</h1>

<p>
    <?php echo Yii::t(
        'P3WidgetsModule.crud',
        'This module provides a control called P3WidgetManager, along with an administration interface.<br/>
       The P3WidgetManager allows you to dynamically create any type of widget.'
    ); ?>
</p>
<p>
    <?php echo Yii::t('P3WidgetsModule.crud', 'This module requires installation.'); ?>
</p>

<ul>
    <li><?php echo CHtml::link(Yii::t('P3WidgetsModule.crud', 'Widgets'), array('p3Widget/admin')) ?></li>
    <li><?php echo CHtml::link(
            Yii::t('P3WidgetsModule.crud', 'Translations'),
            array('p3WidgetTranslation/admin')
        ) ?></li>
    <li>
        <?php echo CHtml::link(Yii::t('P3WidgetsModule.crud', 'Playground'), array('playground')) ?>
    </li>
</ul>

