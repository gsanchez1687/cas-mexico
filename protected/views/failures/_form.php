<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'failures-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'brand_id'); ?>
        <?php echo $form->dropDownList($model,'brand_id',CHtml::listData(Brands::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
        <?php echo $form->error($model,'brand_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'model_id'); ?>
        <?php echo $form->dropDownList($model,'model_id',CHtml::listData(Models::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
        <?php echo $form->error($model,'model_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_failure'); ?>
        <?php echo $form->textArea($model,'description_failure',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description_failure'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'solution'); ?>
        <?php echo $form->textArea($model,'solution',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'solution'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'replacement'); ?>
        <?php echo $form->textField($model,'replacement',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'replacement'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_replacement'); ?>
        <?php echo $form->textArea($model,'description_replacement',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description_replacement'); ?>
    </div>

    <div class="row">
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