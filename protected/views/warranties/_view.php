<?php
/* @var $this WarrantiesController */
/* @var $data Warranties */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cas_id')); ?>:</b>
	<?php echo CHtml::encode($data->cas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_id')); ?>:</b>
	<?php echo CHtml::encode($data->device_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disposition_id')); ?>:</b>
	<?php echo CHtml::encode($data->disposition_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason_return_id')); ?>:</b>
	<?php echo CHtml::encode($data->reason_return_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_customer_complaint')); ?>:</b>
	<?php echo CHtml::encode($data->date_customer_complaint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_date_cas')); ?>:</b>
	<?php echo CHtml::encode($data->claim_date_cas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hour_service')); ?>:</b>
	<?php echo CHtml::encode($data->hour_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('technical_id')); ?>:</b>
	<?php echo CHtml::encode($data->technical_id); ?>
	<br />

	*/ ?>

</div>