<div id="<?php echo P3WidgetContainer::CONTAINER_CSS_PREFIX . $this->id ?>"
     class="widget-container admin control-position-<?php echo $this->controlPosition ?>">
    <div class="header">
        <div>
            <!--[<span class="cssClasses"></span>]-->
             <div>
            <?php
            echo CHtml::dropDownList('alias',
                                     null,
                                     CMap::mergeArray(array('Add Widget to Container \''.$this->id.'\' ...'),Yii::app()->getModule('p3widgets')->params['widgets']),
                                     array('class' => 'create-widget', 'data-widget-attributes' => CJSON::encode($widgetAttributes))
            );

            ?>
            <?php
                 // TODO: why is this button needed? JavaScript sortable errors when removed ?!
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
    </div>
    <?php echo $widgets ?>
</div>