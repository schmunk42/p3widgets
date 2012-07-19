<div id="<?php echo P3WidgetContainer::CONTAINER_CSS_PREFIX . $this->id ?>" class="widget-container admin control-position-<?php echo $this->controlPosition ?>">
    <div class="header">
        Container <?php echo $this->id ?> [<span class="cssClasses"></span>]
        <div>
            <?php
            $this->widget('zii.widgets.jui.CJuiButton', array(
                'buttonType' => 'link',
                #'caption'=>'Create',
                'url' => array('/p3widgets/p3Widget/create', 'P3Widget' => $widgetAttributes, 'returnUrl' => Yii::app()->request->getUrl()),
                'name' => 'btnClick' . uniqid(),
                'options' => array('icons' => 'js:{primary:"ui-icon-plus"}'),
                'htmlOptions' => array(
                    'title' => 'Create Widget'
                )
            ));
            ?>
        </div>
    </div>
    <?php echo $widgets ?>
</div>