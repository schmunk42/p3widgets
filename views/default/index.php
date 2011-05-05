<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Phundament 3 Widgets</h1>

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