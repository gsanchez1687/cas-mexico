<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'failures-form','enableAjaxValidation'=>false,'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="col-md-12">       
        <?php echo CHtml::activeFileField($model, 'file'); ?>
        <?php echo $form->error($model, 'file'); ?>
       </div>    

	<div class="row col-md-4">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',CHtml::listData(Brands::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row col-md-4">
		<?php echo $form->labelEx($model,'model_id'); ?>
		<?php echo $form->dropDownList($model,'model_id',CHtml::listData(Models::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'model_id'); ?>
	</div>

	

	<div class="row col-md-4">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->dropDownList($model,'active',Active::getListActive(),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	 <div class="btn-group">
            <?php echo CHtml::Button(Yii::app()->params['cancel-text'],array('class'=>Yii::app()->params['cancel-btn'],'onclick'=>'history.back(-1)')); ?>	
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Subir carga masiva' : Yii::app()->params['actualizar-text'],array('class'=>Yii::app()->params['save-btn'])); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->