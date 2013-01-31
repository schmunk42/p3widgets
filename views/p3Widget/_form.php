<div class="form">
    <p class="note">
        <?php echo Yii::t('P3WidgetsModule.crud', 'Fields with');?> <span
            class="required">*</span> <?php echo Yii::t('P3WidgetsModule.crud', 'are required');?>        .
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                                                   'id' => 'p3-widget-form',
                                                   'enableAjaxValidation' => true,
                                                   'enableClientValidation' => true,
                                              ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'alias'); ?>
        <?php #echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->dropDownList($model, 'alias', $this->module->params['widgets'], array('onchange' => 'updateProperties()')); ?>
        <?php echo $form->error($model, 'alias'); ?>
        <p class="hint">
            Alias of the widget
        </p>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'rank'); ?>
        <?php echo $form->textField($model, 'rank'); ?>
        <?php echo $form->error($model, 'rank'); ?>
        <div class='hint'><?php if ('hint.rank' != $hint = Yii::t('P3WidgetsModule.crud', 'hint.rank')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'containerId'); ?>
        <?php echo $form->textField($model, 'containerId', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'containerId'); ?>
        <div class='hint'><?php if ('hint.containerId' != $hint = Yii::t('P3WidgetsModule.crud', 'hint.containerId')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'moduleId'); ?>
        <?php echo $form->textField($model, 'moduleId', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'moduleId'); ?>
        <div class='hint'><?php if ('hint.moduleId' != $hint = Yii::t('P3WidgetsModule.crud', 'hint.moduleId')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'controllerId'); ?>
        <?php echo $form->textField($model, 'controllerId', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'controllerId'); ?>
        <div class='hint'><?php if ('hint.controllerId' != $hint = Yii::t('P3WidgetsModule.crud', 'hint.controllerId')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'actionName'); ?>
        <?php echo $form->textField($model, 'actionName', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'actionName'); ?>
        <div class='hint'><?php if ('hint.actionName' != $hint = Yii::t('P3WidgetsModule.crud', 'hint.actionName')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'requestParam'); ?>
        <?php echo $form->textField($model, 'requestParam', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'requestParam'); ?>
        <div class='hint'><?php if ('hint.requestParam' != $hint = Yii::t('P3WidgetsModule.crud', 'hint.requestParam')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sessionParam'); ?>
        <?php echo $form->textField($model, 'sessionParam', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'sessionParam'); ?>
        <div class='hint'><?php if ('hint.sessionParam' != $hint = Yii::t('P3WidgetsModule.crud', 'hint.sessionParam')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <label for="p3WidgetMeta"><?php echo Yii::t('P3WidgetsModule.crud', 'P3WidgetMeta'); ?></label>
        <?php if ($model->p3WidgetMeta !== null) {
        echo $model->p3WidgetMeta->status;
    }; ?><br/>
    </div>


</div> <!-- form -->
<div class="form-actions">

    <?php
    echo CHtml::Button(Yii::t('P3WidgetsModule.crud', 'Cancel'), array(
                                                                      'submit' => array('p3widget/admin'),
                                                                      'class' => 'btn'
                                                                 ));
    echo ' ' . CHtml::submitButton(Yii::t('P3WidgetsModule.crud', 'Save'), array(
                                                                                'class' => 'btn btn-primary'
                                                                           ));
    $this->endWidget(); ?>
</div>
