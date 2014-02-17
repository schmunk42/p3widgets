<?php
    // parse widgets
    $p3widgets = array();
    foreach ($this->module->params['widgets'] AS $alias => $config) {
        if (is_array($config)) {
            if (isset($config['checkAccess']) && !Yii::app()->user->checkAccess($config['checkAccess'])) {
                continue;
            }
            $p3widgets[$alias] = $config['name'];
        } else {
            $p3widgets[$alias] = $config;
        }
    }
    // render dropdown
    echo $form->dropDownList(
        $model,
        'alias',
        $p3widgets,
        array(
            'onchange' => 'updateProperties()'
        )
    );