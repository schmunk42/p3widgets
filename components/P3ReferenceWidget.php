<?php
/**
 * Widget to create a reference to another widget
 */

class P3ReferenceWidget extends CWidget
{
    public $widgetId;
    public $translationLanguage = null;
    public $translationFallback = true;
    public $overrideAttributes = array();

    function run()
    {
        $model = P3Widget::model()->findByPk($this->widgetId);
        $model->setLanguage($this->translationLanguage);
        if ($model !== null) {
            #$properties = CMap::mergeArray(CJSON::decode($model->t('properties', $this->translationLanguage, $this->translationFallback)), $this->overrideAttributes);
            $properties = CMap::mergeArray(CJSON::decode($model->properties_json), $this->overrideAttributes);
            if (Yii::app()->user->checkAccess('P3widgets.Widget.*')) {
                echo "<div class='alert alert-info container-message'>Copy of widget #{$model->id}</div>";
            }
            $this->beginWidget($model->alias, $properties);
            #echo $model->t('content', $this->translationLanguage, $this->translationFallback);
            echo $model->content_html;
            $this->endWidget();
        } else {
            trigger_error("Reference Widget #" . $this->widgetId . " not found!", E_USER_WARNING);
        }
    }
}