<script>
      $(document).ready(function () {      
        
         $("#Requests_failure_id").prop('disabled', true);
         $("#Requests_warranty_id").prop('disabled', true);

         
       
    });
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'requests-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'failure_id'); ?>
		<?php echo $form->dropDownList($model,'failure_id',CHtml::listData(Failures::model()->findAll(array('order' => 'id ASC')), 'id', 'replacement'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'failure_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'warranty_id'); ?>
		<?php echo $form->dropDownList($model,'warranty_id',CHtml::listData(Warranties::model()->findAll(array('order' => 'id ASC')), 'id', 'code'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'warranty_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Active::getListAprobado(),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tracking'); ?>
		<?php echo $form->textField($model,'tracking',array('size'=>60,'maxlength'=>50,'class'=>'input-alfanumerico')); ?>
		<?php echo $form->error($model,'tracking'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'transport_id'); ?>
		<?php echo $form->dropDownList($model,'transport_id',CHtml::listData(Transports::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'transport_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('maxlength'=>'200','rows'=>6, 'cols'=>50,'class'=>'input-alfanumerico-space')); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	

	<div class="row buttons">
	 <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params['crear-text'] : Yii::app()->params['actualizar-text'],array('class'=>Yii::app()->params['save-btn'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->