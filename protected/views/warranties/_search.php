<?php
/* @var $this WarrantiesController */
/* @var $model Warranties */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cas_id'); ?>
		<?php echo $form->textField($model,'cas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'device_id'); ?>
		<?php echo $form->textField($model,'device_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disposition_id'); ?>
		<?php echo $form->textField($model,'disposition_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason_return_id'); ?>
		<?php echo $form->textField($model,'reason_return_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_customer_complaint'); ?>
		<?php echo $form->textField($model,'date_customer_complaint'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_date_cas'); ?>
		<?php echo $form->textField($model,'claim_date_cas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hour_service'); ?>
		<?php echo $form->textField($model,'hour_service'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'technical_id'); ?>
		<?php echo $form->textField($model,'technical_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->