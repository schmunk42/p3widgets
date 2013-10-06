<div class="overlay">
    <div class="controls">
        <div class="pull-left">
            <?php
            if (isset($model)) {
                if ($model->isUpdateable) {
                    $this->widget(
                        'TbButton',
                        array(
                             'buttonType'  => 'link',
                             #'caption' => 'Edit',
                             'url'         => array(
                                 '/p3widgets/p3Widget/update',
                                 'id'        => $model->id,
                                 'returnUrl' => Yii::app()->request->getUrl()
                             ),
                             'icon'        => "pencil",
                             'type'        => $model->statusCssClass,
                             #'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
                             'htmlOptions' => array(
                                 'name'        => 'btnClick' . uniqid(),
                                 'data-toggle' => 'tooltip',
                                 'title'       => "Update Widget #{$model->id}"
                             )
                        )
                    );
                    if ($model->translationModel->isNewRecord) {
                        $this->widget(
                            'TbButton',
                            array(
                                 'buttonType'  => 'link',
                                 #'caption' => 'Translations',
                                 'url'         => array(
                                     '/p3widgets/p3WidgetTranslation/create',
                                     'P3WidgetTranslation' => array(
                                         'p3_widget_id' => $model->id,
                                         'language'     => Yii::app()->language
                                     ),
                                     'returnUrl'           => Yii::app()->request->getUrl()
                                 ),
                                 'icon'        => 'flag',
                                 'type'        => $model->translationModel->statusCssClass,
                                 'htmlOptions' => array(
                                     'name'        => 'btnClick' . uniqid(),
                                     'data-toggle' => 'tooltip',
                                     'title'       => 'Update Translation #' . $model->id,

                                 )
                                 #'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
                            )
                        );
                    } else {
                        $this->widget(
                            'TbButton',
                            array(
                                 'buttonType'  => 'link',
                                 #'caption' => 'Translations',
                                 'url'         => array(
                                     '/p3widgets/p3WidgetTranslation/update',
                                     'id'        => $model->getTranslationModel()->id,
                                     'returnUrl' => Yii::app()->request->getUrl()
                                 ),
                                 'icon'        => 'flag',
                                 'type'        => $model->translationModel->statusCssClass,
                                 #'onclick' => 'js:function(){alert("clicked"); this.blur(); return false;}',
                                 'htmlOptions' => array(
                                     'name'        => 'btnClick' . uniqid(),
                                     'data-toggle' => 'tooltip',
                                     'title'       => 'Update Translation #' . $model->id,
                                 )
                            )
                        );
                    }

                    echo '<div class="handle">';
                    $this->widget(
                        'TbButton',
                        array(
                             #'label'       => 'Move',
                             'buttonType'  => 'link',
                             'icon'        => 'move',
                             #'onclick' => 'js:function(){alert("tbd: drag and drop"); this.blur(); return false;}',
                             'htmlOptions' => array(
                                 'name'  => 'btnClick2' . uniqid(),
                                 'title' => 'Move Widget'
                             )
                        )
                    );
                    echo '</div> ';

                }
                if ($model->isDeleteable) {
                    $this->widget(
                        'TbButton',
                        array(
                             'id'          => 'delete-' . $model->id,
                             'buttonType'  => 'link',
                             'type'        => 'danger',
                             #'caption' => 'Delete',
                             'icon'        => 'remove',
                             // onclick' => see container.js,
                             'htmlOptions' => array(
                                 'name'        => 'btnClick3' . uniqid(),
                                 'title'       => 'Delete Widget with all Translations',
                                 'class'       => 'delete',
                                 'data-toggle' => 'tooltip',
                                 'title'       => "Delete Widget #{$model->id} with " . count(
                                     $model->p3WidgetTranslations
                                 ) . " Translation(s)"

                             )
                        )
                    );
                }
            }
            ?>
        </div>

        <div class="pull-right">
            <?php
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                     'type'    => 'primary',
                     // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                     'buttons' => array(
                         array(
                             'label' => $this->id,
                             'url'   => array(
                                 '/p3widgets/p3Widget/create',
                                 'P3Widget'  => $widgetAttributes,
                                 'returnUrl' => Yii::app()->request->getUrl()
                             ),
                             'icon'  => 'plus',
                             'htmlOptions' => array(
                                 'data-toggle' => 'tooltip',
                                 'title'       => "Create a new Widget in container {$this->id}"
                             )
                         ),
                         array(
                             'items' => Yii::app()->getModule('p3widgets')->buildWidgetMenuItems($widgetAttributes)
                         ),
                     ),
                )
            );
            ?>
            <!--
            <?php
            if (isset($widgetAttributes)) {
                echo CHtml::dropDownList(
                    uniqid('alias'),
                    null,
                    CMap::mergeArray(
                        array( $this->id ),
                        Yii::app()->getModule('p3widgets')->params['widgets']
                    ),
                    array(
                         'class'                  => 'create-widget',
                         'data-widget-attributes' => CJSON::encode($widgetAttributes)
                    )
                );


                // TODO: why is this button needed? JavaScript sortable errors when removed ?!
                $this->widget(
                    'TbButton',
                    array(
                         'buttonType'  => 'link',
                         #'caption'=>'Create',
                         'url'         => array(
                             '/p3widgets/p3Widget/create',
                             'P3Widget'  => $widgetAttributes,
                             'returnUrl' => Yii::app()->request->getUrl()
                         ),
                         'icon'        => 'plus',
                         'htmlOptions' => array(
                             'title' => 'Create Widget',
                             'name'  => 'btnClick' . uniqid(),
                             'data-toggle' => 'tooltip',
                             'title'       => "Create a new Widget in container {$this->id}"

                         )
                    )
                );
            }
            ?>
-->
        </div>
    </div>
</div>