<?php
$alias = CHtml::value($model, 'p3Widget.alias');
$script = <<<EOS
   function updateProperties() {
        $("#P3Widget_default_properties_json").jsoneditor('input');

        url = "{$this->createUrl('/p3widgets/default/classVars', array('alias' => '__ALIAS__'))}";
        url = url.replace("__ALIAS__", $("#P3Widget_alias").val());

        $.ajax(
            url,
            {
                success: function (json) {
                    jQuery("#P3Widget_default_properties_json").jsoneditor('input');
                    $("#P3Widget_default_properties_json textarea").val(json);
                    $("#P3Widget_default_properties_json").jsoneditor('init');
                    //alert(json);
                }
            }
        );
    }
EOS;

Yii::app()->clientScript->registerScript(
    "phundament.p3widgets.reset_properties_function",
    $script,
    CClientScript::POS_BEGIN
);

if (!$model->properties_json || $model->properties_json == "{}") {
    Yii::app()->clientScript->registerScript(
        "phundament.p3widgets.reset_properties",
        "updateProperties();"
    );
}
?>

<?php
echo CHtml::button(
    Yii::t('P3WidgetsModule.crud', 'Reset'),
    array(
         'onclick' => 'if (confirm("' . Yii::t(
             'P3WidgetsModule.crud',
             'Reset all Properties?'
         ) . '")) {resetProperties();}'
    )
);
?>

<?php
$this->widget(
    'jsonEditorView.JuiJSONEditorInput',
    array(
         'model'     => $model,
         'attribute' => 'default_properties_json'
    )
);;
echo $form->error($model, 'default_properties_json')
?>

<span class="help-block">
<?php
echo (($t = Yii::t(
        'p3WidgetsModule.model',
        'help.default_properties_json'
    )) != 'help.default_properties_json') ? $t : ''
?>
</span>

<div class="notice">
    <?php
    echo Yii::t(
        'P3WidgetsModule.crud',
        'Do not use double quotes (") for keys and/or values!'
    ); ?>
</div>