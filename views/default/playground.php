<h1><?php echo Yii::t('P3WidgetsModule.crud', 'Widget Playground'); ?></h1>

<div class="row">
    <div class="span12">
        <?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'top')) ?>
    </div>
</div>

<div class="row">
    <div class="span12">
        <?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'main')) ?>
    </div>
</div>
