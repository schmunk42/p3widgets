<?php
$alias = CHtml::value($model,'p3Widget.alias');
$script = <<<EOS
   function resetProperties() {
        $("#P3WidgetTranslation_properties").jsoneditor('input');

        url = "{$this->createUrl('/p3widgets/default/classVars',array('alias' => '__ALIAS__'))}";
        url = url.replace("__ALIAS__", $("#P3Widget_alias").val());

        $.ajax(
            url,
            {
                success: function (json) {
            jQuery("#P3WidgetTranslation_properties").jsoneditor('input');
            $("#P3WidgetTranslation_properties textarea").val(json);
            $("#P3WidgetTranslation_properties").jsoneditor('init');
            //alert(json);
        }
            }

        );
    }
EOS;

Yii::app()->clientScript->registerScript(
    "phundament.p3widgets.reset_properties_function",
    $script
);

if (!$model->properties_json || $model->properties_json == "{}") {
    Yii::app()->clientScript->registerScript(
        "phundament.p3widgets.reset_properties",
        "resetProperties();"
    );
}
?>
