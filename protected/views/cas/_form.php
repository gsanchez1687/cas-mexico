<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($User); ?>

	

	<div class="row">
		<?php echo $form->labelEx($User,'username'); ?>
		<?php echo $form->textField($User,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($User,'username'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'phone_local'); ?>
		<?php echo $form->textField($model,'phone_local',array('size'=>45,'maxlength'=>10,'placeholder'=>'(999) 999-9999? x99999')); ?>
		<?php echo $form->error($model,'phone_local'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_personal'); ?>
		<?php echo $form->textField($model,'phone_personal',array('size'=>45,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'phone_personal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'representative'); ?>
		<?php echo $form->textField($model,'representative',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'representative'); ?>
	</div>
       

        <div class="row">
            <?php echo $form->labelEx($model,'state_id'); ?>
           <?php echo $form->dropDownList($model,'state_id',CHtml::listData(States::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
            <?php echo $form->error($model,'state_id'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'city_id'); ?>
          <?php echo $form->dropDownList($model,'city_id',CHtml::listData(Cities::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
            <?php echo $form->error($model,'city_id'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'record_fiscal'); ?>
		<?php echo $form->textField($model,'record_fiscal',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'record_fiscal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',CHtml::listData(Categories::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->dropDownList($model,'active',Active::getListActive(),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>


        <br />
        <div class="btn-group">
            <?php echo CHtml::Button(Yii::app()->params['cancel-text'],array('class'=>Yii::app()->params['cancel-btn'],'onclick'=>'history.back(-1)')); ?>	
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params['crear-text'] : Yii::app()->params['actualizar-text'],array('class'=>Yii::app()->params['save-btn'])); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->