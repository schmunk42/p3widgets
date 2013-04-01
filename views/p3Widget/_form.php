<div class="">
    <p class="note">
        <?php echo Yii::t('P3WidgetsModule.crud', 'Fields with');?> <span
            class="required">*</span> <?php echo Yii::t('P3WidgetsModule.crud', 'are required');?>        .
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                                                   'id'                     => 'p3-widget-form',
                                                   'enableAjaxValidation'   => true,
                                                   'enableClientValidation' => true,
                                              ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <div class="span4">
            <?php echo $form->labelEx($model, 'alias'); ?>
            <?php #echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->dropDownList($model, 'alias', $this->module->params['widgets'], array('onchange' => 'updateProperties()')); ?>
            <?php echo $form->error($model, 'alias'); ?>
            <div class='hint'><?php if ('help.alias' != $hint = Yii::t('P3WidgetsModule.crud', 'help.alias')) {
                    echo $hint;
                } ?></div>
        </div>
    </div>

    <hr/>


    <div class="row">
        <div class="span3">
            <?php echo $form->labelEx($model, 'moduleId'); ?>
            <?php echo $form->textField($model, 'moduleId', array('class'     => 'input-block-level', 'size' => 60,
                                                                  'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'moduleId'); ?>
            <div class='hint'><?php if ('help.moduleId' != $hint = Yii::t('P3WidgetsModule.crud', 'help.moduleId')) {
                    echo $hint;
                } ?></div>
        </div>

        <div class="span3">

            <?php echo $form->labelEx($model, 'controllerId'); ?>
            <?php echo $form->textField($model, 'controllerId', array('class' => 'input-block-level',
                                                                      'size'  => 60, 'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'controllerId'); ?>
            <div
                class='hint'><?php if ('help.controllerId' != $hint = Yii::t('P3WidgetsModule.crud', 'help.controllerId')) {
                    echo $hint;
                } ?></div>
        </div>

        <div class="span3">
            <?php echo $form->labelEx($model, 'actionName'); ?>
            <?php echo $form->textField($model, 'actionName', array('class'     => 'input-block-level', 'size' => 60,
                                                                    'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'actionName'); ?>
            <div
                class='hint'><?php if ('help.actionName' != $hint = Yii::t('P3WidgetsModule.crud', 'help.actionName')) {
                    echo $hint;
                } ?></div>
        </div>

        <div class="span3">
            <?php echo $form->labelEx($model, 'requestParam'); ?>
            <?php echo $form->textField($model, 'requestParam', array('class'     => 'input-block-level', 'size' => 60,
                                                                      'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'requestParam'); ?>
            <div
                class='hint'><?php if ('help.requestParam' != $hint = Yii::t('P3WidgetsModule.crud', 'help.requestParam')) {
                    echo $hint;
                } ?></div>
        </div>
    </div>

    <hr/>
    <div class="row">
        <div class="span3">
            <?php echo $form->labelEx($model, 'containerId'); ?>
            <?php echo $form->textField($model, 'containerId', array('class'     => 'input-block-level', 'size' => 60,
                                                                     'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'containerId'); ?>
            <div
                class='hint'><?php if ('help.containerId' != $hint = Yii::t('P3WidgetsModule.crud', 'help.containerId')) {
                    echo $hint;
                } ?></div>
        </div>
        <div class="span3">
            <?php echo $form->labelEx($model, 'rank'); ?>
            <?php echo $form->textField($model, 'rank', array('class' => 'input-block-level')); ?>
            <?php echo $form->error($model, 'rank'); ?>
            <div class='hint'><?php if ('help.rank' != $hint = Yii::t('P3WidgetsModule.crud', 'help.rank')) {
                    echo $hint;
                } ?></div>
        </div>
    </div>

    <hr/>
    <div class="row">
        <div class="span3">
            <?php echo $form->labelEx($model, 'sessionParam'); ?>
            <?php echo $form->textField($model, 'sessionParam', array('class'     => 'input-block-level', 'size' => 60,
                                                                      'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'sessionParam'); ?>
            <div
                class='hint'><?php if ('help.sessionParam' != $hint = Yii::t('P3WidgetsModule.crud', 'help.sessionParam')) {
                    echo $hint;
                } ?></div>
        </div>
    </div>

    <div class="form-actions">
        <?php
        echo CHtml::Button(Yii::t('P3WidgetsModule.crud', 'Cancel'),
                           array(
                                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('p3widget/admin'),
                                'class'  => 'btn'
                           ));
        echo ' ';
        echo CHtml::submitButton(Yii::t('P3WidgetsModule.crud', 'Save'),
                                 array(
                                      'class' => 'btn btn-primary'
                                 ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div> <!-- form -->
