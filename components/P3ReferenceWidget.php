<?php
/**
 * Widget to create a reference to another widget
 */

class P3ReferenceWidget extends CWidget
{
    public $widgetId;

    function run()
    {
        $model = P3Widget::model()->findByPk($this->widgetId);
        if ($model !== null) {
            $this->beginWidget($model->alias, CJSON::decode($model->t('properties')));
            echo $model->t('content');
            $this->endWidget();
        } else {
            trigger_error("Reference Widget #".$this->widgetId." not found!", E_USER_WARNING);
        }
    }
}