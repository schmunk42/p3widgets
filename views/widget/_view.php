<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('properties')); ?>:</b>
	<?php echo CHtml::encode($data->properties); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rank')); ?>:</b>
	<?php echo CHtml::encode($data->rank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('containerId')); ?>:</b>
	<?php echo CHtml::encode($data->containerId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moduleId')); ?>:</b>
	<?php echo CHtml::encode($data->moduleId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controllerId')); ?>:</b>
	<?php echo CHtml::encode($data->controllerId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('actionName')); ?>:</b>
	<?php echo CHtml::encode($data->actionName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requestParam')); ?>:</b>
	<?php echo CHtml::encode($data->requestParam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sessionParam')); ?>:</b>
	<?php echo CHtml::encode($data->sessionParam); ?>
	<br />

	*/ ?>

</div>