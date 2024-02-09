<div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'items-form','enableAjaxValidation'=>false)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textArea($model,'item',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->dropDownList($model,'menu_id',CHtml::listData(Menus::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

	<div>
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