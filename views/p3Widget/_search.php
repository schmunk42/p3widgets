<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->dropDownList($model,'status',P3Widget::optsstatus(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'alias'); ?>
        <?php $this->renderPartial('columns/alias', array('model' => $model, 'form' => $form)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'default_properties_json'); ?>
        <?php $this->renderPartial('columns/default_properties_json', array('model' => $model, 'form' => $form)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'default_content_html'); ?>
        <?php $this->widget('CKEditor', array('model' => $model, 'attribute' => 'default_content_html', 'options' => Yii::app()->params['ext.ckeditor.options']));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'name_id'); ?>
        <?php echo $form->textField($model, 'name_id', array('size' => 60, 'maxlength' => 64)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'container_id'); ?>
        <?php echo $form->textField($model, 'container_id', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'rank'); ?>
        <?php echo $form->textField($model, 'rank'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'request_param'); ?>
        <?php echo $form->textField($model, 'request_param', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'action_name'); ?>
        <?php echo $form->textField($model, 'action_name', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'controller_id'); ?>
        <?php echo $form->textField($model, 'controller_id', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'module_id'); ?>
        <?php echo $form->textField($model, 'module_id', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'session_param'); ?>
        <?php echo $form->textField($model, 'session_param', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_owner'); ?>
        <?php echo $form->textField($model,'access_owner',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_domain'); ?>
        <?php echo $form->dropDownList($model,'access_domain',P3Widget::optsaccessdomain(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_read'); ?>
        <?php echo $form->dropDownList($model,'access_read',P3Widget::optsaccessread(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_update'); ?>
        <?php echo $form->dropDownList($model,'access_update',P3Widget::optsaccessupdate(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_delete'); ?>
        <?php echo $form->dropDownList($model,'access_delete',P3Widget::optsaccessdelete(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'copied_from_id'); ?>
        <?php echo $form->textField($model,'copied_from_id',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_at'); ?>
        <?php echo $form->textField($model,'created_at',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'updated_at'); ?>
        <?php echo $form->textField($model,'updated_at',array('disabled'=>'disabled')); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('P3WidgetsModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
