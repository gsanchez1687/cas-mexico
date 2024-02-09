<div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'users-form','enableAjaxValidation'=>false)); ?>

	<p class="note">Los Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

        <div>
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50,'class'=>'input-alfanumerico-space')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>45,'maxlength'=>50,'class'=>'input-alfanumerico-space')); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>
	
	<div>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>50,'class'=>'input-alfanumerico-space')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'input-email')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        

	<div>
		<?php echo $form->labelEx($model,'phone_local'); ?>
		<?php echo $form->textField($model,'phone_local',array('size'=>45,'maxlength'=>20,'class'=>'input-integer-space')); ?>
		<?php echo $form->error($model,'phone_local'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'phone_personal'); ?>
		<?php echo $form->textField($model,'phone_personal',array('size'=>45,'maxlength'=>20,'class'=>'input-integer-space')); ?>
		<?php echo $form->error($model,'phone_personal'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'maxlength'=>100,'class'=>'input-namefile')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Active::getListActive(),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
        
	<div>
		<?php echo $form->labelEx($model,'rol_id'); ?>		
                <?php echo $form->dropDownList($model,'rol_id',CHtml::listData(Roles::model()->findAll('id IN (2,4,6)',array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'rol_id'); ?>
	</div>

</div>
    <br />
    <div class="btn-group">
        <?php echo CHtml::Button(Yii::app()->params['cancel-text'],array('class'=>Yii::app()->params['cancel-btn'],'onclick'=>'history.back(-1)')); ?>	
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params['crear-text'] : Yii::app()->params['actualizar-text'],array('class'=>Yii::app()->params['save-btn'])); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->