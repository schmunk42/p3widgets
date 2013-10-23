<?php
$this->setPageTitle(
    Yii::t('P3WidgetsModule.model', 'P3 Widgets')
    . ' - '
    . Yii::t('P3WidgetsModule.crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('P3WidgetsModule.model', 'P3 Widgets');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'p3-widget-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('P3WidgetsModule.model', 'P3 Widgets'); ?>
        <small><?php echo Yii::t('P3WidgetsModule.crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('P3Widget.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'p3-widget-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'status',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'alias',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'default_properties_json',
            #'default_content_html',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'name_id',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'container_id',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'rank',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'request_param',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'action_name',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'controller_id',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'module_id',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'session_param',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_owner',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_domain',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_read',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_update',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_delete',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'copied_from_id',
                'editable' => array(
                    'url' => $this->createUrl('/p3widgets/p3Widget/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'created_at',
            #'updated_at',
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("P3widgets.P3Widget.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("P3widgets.P3Widget.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("P3widgets.P3Widget.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('P3Widget.view.grid'); ?>