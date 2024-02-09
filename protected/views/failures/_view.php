<?php
/* @var $this FailuresController */
/* @var $data Failures */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_id')); ?>:</b>
	<?php echo CHtml::encode($data->model_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_failure')); ?>:</b>
	<?php echo CHtml::encode($data->description_failure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solution')); ?>:</b>
	<?php echo CHtml::encode($data->solution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('replacement')); ?>:</b>
	<?php echo CHtml::encode($data->replacement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_replacement')); ?>:</b>
	<?php echo CHtml::encode($data->description_replacement); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>