<?php echo $form->dropDownList(
    $model,
    'alias',
    $this->module->params['widgets'],
    array('onchange' => 'updateProperties()')
);