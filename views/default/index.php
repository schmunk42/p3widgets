<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Phundament 3 Widgets</h1>

<?php if (YII_DEBUG) { ?>
<div class="flash-notice">
	Note: If <b>YII_DEBUG</b> is set to <i>true</i>, access is not restricted.
</div>
<?php } ?>


<p>
This module provides a control called P3WidgetManager, along with an administration interface.<br/>
The P3WidgetManager allows you to dynamically create any type of widget.
</p>
<p>
This module requires installation.
</p>
<p>
	<?php echo CHtml::link('Manage Widgets', array('widget/admin'))?>
</p>

<p>
	<?php echo CHtml::link('Test Page', array('test'))?>
</p>