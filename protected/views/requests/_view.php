<?php
/* @var $this RequestsController */
/* @var $data Requests */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('failure_id')); ?>:</b>
	<?php echo CHtml::encode($data->failure_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('warranty_id')); ?>:</b>
	<?php echo CHtml::encode($data->warranty_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tracking')); ?>:</b>
	<?php echo CHtml::encode($data->tracking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_initial')); ?>:</b>
	<?php echo CHtml::encode($data->date_initial); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_final')); ?>:</b>
	<?php echo CHtml::encode($data->date_final); ?>
	<br />

	*/ ?>

</div>