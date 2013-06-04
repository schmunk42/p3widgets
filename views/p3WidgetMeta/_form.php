<div class="form">
<p class="note">
    <?php echo Yii::t('P3WidgetsModule.crud', 'Fields with'); ?> <span
        class="required">*</span> <?php echo Yii::t('P3WidgetsModule.crud', 'are required'); ?>.
</p>

<?php
$form = $this->beginWidget(
    'CActiveForm',
    array(
         'id'                     => 'p3-widget-meta-form',
         'enableAjaxValidation'   => true,
         'enableClientValidation' => true,
    )
);

echo $form->errorSummary($model);
?>

<div class="row">
    <?php echo $form->labelEx($model, 'status'); ?>

    <?php echo $form->textField($model, 'status'); ?>
    <?php echo $form->error($model, 'status'); ?>
    <?php if ('help.status' != $help = Yii::t('P3WidgetsModule.crud', 'help.status')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'type'); ?>
    <?php echo $form->textField($model, 'type', array('size' => 60, 'maxlength' => 64)); ?>
    <?php echo $form->error($model, 'type'); ?>
    <?php if ('help.type' != $help = Yii::t('P3WidgetsModule.crud', 'help.type')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'language'); ?>
    <?php echo $form->textField($model, 'language', array('size' => 8, 'maxlength' => 8)); ?>
    <?php echo $form->error($model, 'language'); ?>
    <?php if ('help.language' != $help = Yii::t('P3WidgetsModule.crud', 'help.language')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'treePosition'); ?>
    <?php echo $form->textField($model, 'treePosition'); ?>
    <?php echo $form->error($model, 'treePosition'); ?>
    <?php if ('help.treePosition' != $help = Yii::t('P3WidgetsModule.crud', 'help.treePosition')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'begin'); ?>
    <?php echo $form->textField($model, 'begin'); ?>
    <?php echo $form->error($model, 'begin'); ?>
    <?php if ('help.begin' != $help = Yii::t('P3WidgetsModule.crud', 'help.begin')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'end'); ?>
    <?php echo $form->textField($model, 'end'); ?>
    <?php echo $form->error($model, 'end'); ?>
    <?php if ('help.end' != $help = Yii::t('P3WidgetsModule.crud', 'help.end')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'keywords'); ?>
    <?php echo $form->textArea($model, 'keywords', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'keywords'); ?>
    <?php if ('help.keywords' != $help = Yii::t('P3WidgetsModule.crud', 'help.keywords')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'customData'); ?>
    <?php echo $form->textArea($model, 'customData', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'customData'); ?>
    <?php if ('help.customData' != $help = Yii::t('P3WidgetsModule.crud', 'help.customData')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'label'); ?>
    <?php echo $form->textField($model, 'label'); ?>
    <?php echo $form->error($model, 'label'); ?>
    <?php if ('help.label' != $help = Yii::t('P3WidgetsModule.crud', 'help.label')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'owner'); ?>
    <?php echo $form->textField($model, 'owner', array('size' => 60, 'maxlength' => 64)); ?>
    <?php echo $form->error($model, 'owner'); ?>
    <?php if ('help.owner' != $help = Yii::t('P3WidgetsModule.crud', 'help.owner')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'checkAccessCreate'); ?>
    <?php echo $form->textField($model, 'checkAccessCreate', array('size' => 60, 'maxlength' => 256)); ?>
    <?php echo $form->error($model, 'checkAccessCreate'); ?>
    <?php if ('help.checkAccessCreate' != $help = Yii::t('P3WidgetsModule.crud', 'help.checkAccessCreate')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'checkAccessRead'); ?>
    <?php echo $form->textField($model, 'checkAccessRead', array('size' => 60, 'maxlength' => 256)); ?>
    <?php echo $form->error($model, 'checkAccessRead'); ?>
    <?php if ('help.checkAccessRead' != $help = Yii::t('P3WidgetsModule.crud', 'help.checkAccessRead')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'checkAccessUpdate'); ?>
    <?php echo $form->textField($model, 'checkAccessUpdate', array('size' => 60, 'maxlength' => 256)); ?>
    <?php echo $form->error($model, 'checkAccessUpdate'); ?>
    <?php if ('help.checkAccessUpdate' != $help = Yii::t('P3WidgetsModule.crud', 'help.checkAccessUpdate')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'checkAccessDelete'); ?>
    <?php echo $form->textField($model, 'checkAccessDelete', array('size' => 60, 'maxlength' => 256)); ?>
    <?php echo $form->error($model, 'checkAccessDelete'); ?>
    <?php if ('help.checkAccessDelete' != $help = Yii::t('P3WidgetsModule.crud', 'help.checkAccessDelete')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'createdAt'); ?>
    <?php echo $form->textField($model, 'createdAt'); ?>
    <?php echo $form->error($model, 'createdAt'); ?>
    <?php if ('help.createdAt' != $help = Yii::t('P3WidgetsModule.crud', 'help.createdAt')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'createdBy'); ?>
    <?php echo $form->textField($model, 'createdBy', array('size' => 60, 'maxlength' => 64)); ?>
    <?php echo $form->error($model, 'createdBy'); ?>
    <?php if ('help.createdBy' != $help = Yii::t('P3WidgetsModule.crud', 'help.createdBy')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'modifiedAt'); ?>
    <?php echo $form->textField($model, 'modifiedAt'); ?>
    <?php echo $form->error($model, 'modifiedAt'); ?>
    <?php if ('help.modifiedAt' != $help = Yii::t('P3WidgetsModule.crud', 'help.modifiedAt')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'modifiedBy'); ?>
    <?php echo $form->textField($model, 'modifiedBy', array('size' => 60, 'maxlength' => 64)); ?>
    <?php echo $form->error($model, 'modifiedBy'); ?>
    <?php if ('help.modifiedBy' != $help = Yii::t('P3WidgetsModule.crud', 'help.modifiedBy')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'guid'); ?>
    <?php echo $form->textField($model, 'guid', array('size' => 60, 'maxlength' => 64)); ?>
    <?php echo $form->error($model, 'guid'); ?>
    <?php if ('help.guid' != $help = Yii::t('P3WidgetsModule.crud', 'help.guid')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'ancestor_guid'); ?>
    <?php echo $form->textField($model, 'ancestor_guid', array('size' => 60, 'maxlength' => 64)); ?>
    <?php echo $form->error($model, 'ancestor_guid'); ?>
    <?php if ('help.ancestor_guid' != $help = Yii::t('P3WidgetsModule.crud', 'help.ancestor_guid')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <?php echo $form->labelEx($model, 'model'); ?>
    <?php echo $form->textField($model, 'model', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($model, 'model'); ?>
    <?php if ('help.model' != $help = Yii::t('P3WidgetsModule.crud', 'help.model')) {
        echo "<span class='help-block'>$help</span>";
    } ?></div>

<div class="row">
    <label for="id0"><?php echo Yii::t('P3WidgetsModule.crud', 'Id0'); ?></label>
    <?php $this->widget(
        'Relation',
        array(
             'model'       => $model,
             'relation'    => 'id0',
             'fields'      => 'alias',
             'allowEmpty'  => false,
             'style'       => 'dropdownlist',
             'htmlOptions' => array(
                 'checkAll' => 'all'
             ),
        )
    ); ?><br/>
</div>

<div class="row">
    <label for="treeParent"><?php echo Yii::t('P3WidgetsModule.crud', 'TreeParent'); ?></label>
    <?php $this->widget(
        'Relation',
        array(
             'model'       => $model,
             'relation'    => 'treeParent',
             'fields'      => 'status',
             'allowEmpty'  => true,
             'style'       => 'dropdownlist',
             'htmlOptions' => array(
                 'checkAll' => 'all'
             ),
        )
    ); ?><br/>
</div>


</div> <!-- form -->
<div class="form-actions">

    <?php
    echo CHtml::Button(
        Yii::t('P3WidgetsModule.crud', 'Cancel'),
        array(
             'submit' => (isset($_GET['returnUrl'])) ?
                 $_GET['returnUrl'] :
                 array('p3WidgetMeta/admin'),
             'class'  => 'btn'
        )
    );
    echo ' ';
    echo CHtml::submitButton(
        Yii::t('P3WidgetsModule.crud', 'Save'),
        array(
             'class' => 'btn btn-primary'
        )
    );
    $this->endWidget(); ?>
</div>
