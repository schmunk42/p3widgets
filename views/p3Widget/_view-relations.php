
<!--
<h2>
    <?php echo Yii::t('P3WidgetsModule.crud', 'Relations') ?></h2>
-->


<?php 
        echo '<h3>';
            echo Yii::t('P3WidgetsModule.model','relation.P3WidgetTranslations').' ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' =>  array('//p3widgets/p3WidgetTranslation/admin','P3WidgetTranslation' => array('p3_widget_id' => $model->{$model->tableSchema->primaryKey}))
                        ),
                        array(
                'icon' => 'icon-plus',
                'url' => array(
                    '//p3widgets/p3WidgetTranslation/create',
                    'P3WidgetTranslation' => array('p3_widget_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),
            
                    )
                )
            );
        echo '</h3>' ?>
<ul>

    <?php
    $records = $model->p3WidgetTranslations(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('/p3widgets/p3WidgetTranslation/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('/p3widgets/p3WidgetTranslation/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

