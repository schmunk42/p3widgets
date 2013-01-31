<?php
$this->breadcrumbs['P3 Widgets'] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    P3 Widget <small>View #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<h2>
    Data
</h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
            'id',
        'alias',
        'rank',
        'containerId',
        'moduleId',
        'controllerId',
        'actionName',
        'requestParam',
        'sessionParam',
),
        )); ?></p>


<h2>
    Relations
</h2>

<div class='row'>
<div class='span3'><?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'p3WidgetMeta', 'icon'=>'icon-list-alt', 'url'=> array('p3WidgetMeta/admin')),
                array('icon'=>'icon-plus', 'url'=>array('p3WidgetMeta/create', 'P3WidgetMeta' => array('id'=>$model->{$model->tableSchema->primaryKey}))),
        ),
    )); ?></div><div class='span8'>
<?php
    echo '<span class=label>CHasOneRelation</span>';
    $relatedModel = $model->p3WidgetMeta; 

    if ($relatedModel !== null) {
        echo CHtml::openTag('ul');
        echo '<li>';
        echo CHtml::link(
            '#'.$model->p3WidgetMeta->id.' '.$model->p3WidgetMeta->status,
            array('p3WidgetMeta/view','id'=>$model->p3WidgetMeta->id),
            array('class'=>''));

        echo '</li>';

        echo CHtml::closeTag('ul');
    }
?></div></div>
<div class='row'>
<div class='span3'><?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'p3WidgetTranslations', 'icon'=>'icon-list-alt', 'url'=> array('p3WidgetTranslation/admin')),
                array('icon'=>'icon-plus', 'url'=>array('p3WidgetTranslation/create', 'P3WidgetTranslation' => array('p3_widget_id'=>$model->{$model->tableSchema->primaryKey}))),
        ),
    )); ?></div><div class='span8'>
<?php
    echo '<span class=label>CHasManyRelation</span>';
    if (is_array($model->p3WidgetTranslations)) {

        echo CHtml::openTag('ul');
            foreach($model->p3WidgetTranslations as $relatedModel) {

                echo '<li>';
                echo CHtml::link($relatedModel->language, array('p3WidgetTranslation/view','id'=>$relatedModel->id), array('class'=>''));

                echo '</li>';
            }
        echo CHtml::closeTag('ul');
    }
?></div>
</div>
