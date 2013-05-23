<?php
/**
 * Widget to create a reference to another widget
 */

class P3ReferenceWidget extends CWidget
{
    public $widgetId;
    public $overrideAttributes = array();

    function run()
    {
        $model = P3Widget::model()->findByPk($this->widgetId);
        if ($model !== null) {
            $properties = CMap::mergeArray(CJSON::decode($model->t('properties')), $this->overrideAttributes);
            $this->beginWidget($model->alias, $properties);
            echo $model->t('content');
            $this->endWidget();
        } else {
            trigger_error("Reference Widget #" . $this->widgetId . " not found!", E_USER_WARNING);
        }
    }
}