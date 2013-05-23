<div class="btn-toolbar">
    <div class="btn-group">
        <?php  ?><?php
        switch ($this->action->id) {
            case "create":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label" => Yii::t('P3WidgetsModule.crud', 'Manage'),
                         "icon"  => "icon-list-alt",
                         "url"   => array("admin")
                    )
                );
                break;
            case "admin":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label" => Yii::t('P3WidgetsModule.crud', 'Create'),
                         "icon"  => "icon-plus",
                         "url"   => array("create")
                    )
                );
                break;
            case "view":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label" => Yii::t('P3WidgetsModule.crud', 'Manage'),
                         "icon"  => "icon-list-alt",
                         "url"   => array("admin")
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label" => Yii::t('P3WidgetsModule.crud', 'Update'),
                         "icon"  => "icon-edit",
                         "url"   => array("update", "id" => $model->{$model->tableSchema->primaryKey})
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label" => Yii::t('P3WidgetsModule.crud', 'Create'),
                         "icon"  => "icon-plus",
                         "url"   => array("create")
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label"       => Yii::t('P3WidgetsModule.crud', 'Delete'),
                         "type"        => "danger",
                         "icon"        => "icon-remove icon-white",
                         "htmlOptions" => array(
                             "submit"  => array(
                                 "delete",
                                 "id"        => $model->{$model->tableSchema->primaryKey},
                                 "returnUrl" => Yii::app()->request->getParam("returnUrl")
                             ),
                             "confirm" => "Do you want to delete this item?"
                         )
                    )
                );
                break;
            case "update":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label" => Yii::t('P3WidgetsModule.crud', 'Manage'),
                         "icon"  => "icon-list-alt",
                         "url"   => array("admin")
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label" => Yii::t('P3WidgetsModule.crud', 'View'),
                         "icon"  => "icon-eye-open",
                         "url"   => array("view", "id" => $model->{$model->tableSchema->primaryKey})
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                         "label"       => Yii::t('P3WidgetsModule.crud', 'Delete'),
                         "type"        => "danger",
                         "icon"        => "icon-remove icon-white",
                         "htmlOptions" => array(
                             "submit"  => array(
                                 "delete",
                                 "id"        => $model->{$model->tableSchema->primaryKey},
                                 "returnUrl" => Yii::app()->request->getParam("returnUrl")
                             ),
                             "confirm" => "Do you want to delete this item?"
                         )
                    )
                );
                break;
        }
        ?>    </div>
    <?php if ($this->action->id == 'admin'): ?>
        <div class="btn-group">
            <?php
            $this->widget(
                "bootstrap.widgets.TbButton",
                array(
                     "label"       => Yii::t('P3WidgetsModule.crud', 'Search'),
                     "icon"        => "icon-search",
                     "htmlOptions" => array("class" => "search-button")
                )
            );?>    </div>

        <div class="btn-group">
            <?php $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                     'buttons' => array(
                         array(
                             'label' => Yii::t('P3WidgetsModule.crud', 'Relations'),
                             'icon'  => 'icon-search',
                             'items' => array(
                                 array('label' => 'p3Widget - P3Widget', 'url' => array('p3Widget/admin')),
                             )
                         ),
                     ),
                )
            );
            ?>        </div>


    <?php endif; ?></div>

<?php if ($this->action->id == 'admin'): ?>
    <div class="search-form" style="display:none">
    <?php $this->renderPartial(
        '_search',
        array(
             'model' => $model,
        )
    ); ?>
    </div>
<?php endif; ?>