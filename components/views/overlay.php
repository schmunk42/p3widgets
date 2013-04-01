<div class="overlay">
    <div class="controls">
        <div class="pull-left">
            <?php
            if (isset($model)) {
                if (!$model->p3WidgetMeta->checkAccessUpdate || Yii::app()->user->checkAccess($model->p3WidgetMeta->checkAccessUpdate)) {
                    if (!$model->t('language')) {
                        $this->widget('zii.widgets.jui.CJuiButton',
                                      array(
                                           'buttonType'  => 'link',
                                           #'caption' => 'Translations',
                                           'url'         => array('/p3widgets/p3WidgetTranslation/create',
                                                                  'P3WidgetTranslation' => array('p3_widget_id' => $model->id,
                                                                                                 'language'     => Yii::app()->language),
                                                                  'returnUrl'           => Yii::app()->request->getUrl()),
                                           'name'        => 'btnClick' . uniqid(),
                                           'options'     => array('icons' => 'js:{primary:"ui-icon-plusthick"}'),
                                           'htmlOptions' => array(
                                               'title' => 'Create Widget Translation'
                                           )
                                           #'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
                                      ));
                    }
                    else {
                        $this->widget('zii.widgets.jui.CJuiButton',
                                      array(
                                           'buttonType'  => 'link',
                                           #'caption' => 'Translations',
                                           'url'         => array('/p3widgets/p3WidgetTranslation/update',
                                                                  'id'        => $model->getTranslationModel()->id,
                                                                  'returnUrl' => Yii::app()->request->getUrl()),
                                           'name'        => 'btnClick' . uniqid(),
                                           'options'     => array('icons' => 'js:{primary:"ui-icon-pencil"}'),
                                           #'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
                                           'htmlOptions' => array(
                                               'title' => 'Update Widget Translation'
                                           )
                                      ));
                    }
                    echo '<div class="handle">';
                    $this->widget('zii.widgets.jui.CJuiButton',
                                  array(
                                       #'caption' => 'Move',
                                       'buttonType'  => 'link',
                                       'name'        => 'btnClick2' . uniqid(),
                                       'options'     => array('icons' => 'js:{primary:"ui-icon-arrow-4"}'),
                                       #'onclick' => 'js:function(){alert("tbd: drag and drop"); this.blur(); return false;}',
                                       'htmlOptions' => array(
                                           'title' => 'Move Widget'
                                       )
                                  ));
                    echo '</div> ';
                    $this->widget('zii.widgets.jui.CJuiButton',
                                  array(
                                       'buttonType'  => 'link',
                                       #'caption' => 'Edit',
                                       'url'         => array('/p3widgets/p3Widget/update',
                                                              'id'        => $model->id,
                                                              'returnUrl' => Yii::app()->request->getUrl()),
                                       'name'        => 'btnClick' . uniqid(),
                                       'options'     => array('icons' => 'js:{primary:"ui-icon-wrench"}'),
                                       #'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
                                       'htmlOptions' => array(
                                           'title' => 'Update Widget Details'
                                       )
                                  ));
                    $this->widget('zii.widgets.jui.CJuiButton',
                                  array(
                                       'buttonType'  => 'link',
                                       #'caption' => 'Meta Data',
                                       'url'         => array('/p3widgets/p3WidgetMeta/update',
                                                              'id'        => $model->id,
                                                              'returnUrl' => Yii::app()->request->getUrl()),
                                       'name'        => 'btnClick' . uniqid(),
                                       'options'     => array('icons' => 'js:{primary:"ui-icon-info"}'),
                                       #'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
                                       'htmlOptions' => array(
                                           'title' => 'Update Widget Meta Data'
                                       )
                                  ));
                }
                if (!$model->p3WidgetMeta->checkAccessDelete || Yii::app()->user->checkAccess($model->p3WidgetMeta->checkAccessDelete)) {
                    $this->widget('zii.widgets.jui.CJuiButton',
                                  array(
                                       'id'          => 'delete-' . $model->id,
                                       'buttonType'  => 'link',
                                       #'caption' => 'Delete',
                                       'name'        => 'btnClick3' . uniqid(),
                                       'options'     => array('icons' => 'js:{primary:"ui-icon-close"}'),
                                       // onclick' => see container.js,
                                       'htmlOptions' => array(
                                           'title' => 'Delete Widget with all Translations',
                                           'class' => 'delete'
                                       )
                                  ));
                }
            }
            ?>
        </div>

        <div class="pull-right">
            <?php
            if (isset($widgetAttributes)) {
                echo CHtml::dropDownList(uniqid('alias'),
                                         null,
                                         CMap::mergeArray(array('Add Widget to Container \'' . $this->id . '\' ...'),
                                                          Yii::app()
                                                              ->getModule('p3widgets')->params['widgets']),
                                         array('class'                  => 'create-widget',
                                               'data-widget-attributes' => CJSON::encode($widgetAttributes))
                );


                // TODO: why is this button needed? JavaScript sortable errors when removed ?!
                $this->widget('zii.widgets.jui.CJuiButton',
                              array(
                                   'buttonType'  => 'link',
                                   #'caption'=>'Create',
                                   'url'         => array(
                                       '/p3widgets/p3Widget/create',
                                       'P3Widget'  => $widgetAttributes,
                                       'returnUrl' => Yii::app()->request->getUrl()
                                   ),
                                   'name'        => 'btnClick' . uniqid(),
                                   'options'     => array('icons' => 'js:{primary:"ui-icon-plus"}'),
                                   'htmlOptions' => array(
                                       'title' => 'Create Widget'
                                   )
                              ));
            }
            ?>
        </div>
    </div>
</div>