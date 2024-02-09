<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devices-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',CHtml::listData(Categories::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20,'class'=>'input-alfanumerico')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model, 'sale_date'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'sale_date',
                'value' => $model->sale_date,
                'language' => 'en',
                'htmlOptions' => array('readonly' => "readonly",),
                'options' => array(
                    'autoSize' => 'true',
                    'defaultDate' => $model->sale_date,
                    'dateFormat' => 'yy-mm-dd',                               
                    'selectOtherMonths' => 'true',
                    'showAnim' => 'fold', //slide
                    'showButtonPanel' => 'true',
                    'showOn' => 'button',
                    'showOtherMonths' => 'true',
                    'showOtherYears' => 'true',
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'minDate' => '-100Y', //fecha minima
                    'maxDate' => '0', //fecha maxima
                ),
            ));
            ?>
        <?php echo $form->error($model, 'sale_date'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'bill_sale'); ?>
		<?php echo $form->textField($model,'bill_sale',array('size'=>20,'maxlength'=>20,'class'=>'input-alfanumerico')); ?>
		<?php echo $form->error($model,'bill_sale'); ?>
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