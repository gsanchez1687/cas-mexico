<?php $form = $this->beginWidget('CActiveForm', array('id' => 'devices-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
<div class="row">    
    <div class="col-md-12">       
        <?php echo CHtml::activeFileField($model, 'file'); ?>
        <?php echo $form->error($model, 'file'); ?>
    </div>    
<br />
<br />
<br />
    <div class="col-md-6">
            <?php echo $form->labelEx($model,'brand_id'); ?>
            <?php echo $form->dropDownList($model,'brand_id',CHtml::listData(Brands::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
            <?php echo $form->error($model,'brand_id'); ?>
    </div>
    <div class="col-md-6">
            <?php echo $form->labelEx($model,'model_id'); ?>
            <?php echo $form->dropDownList($model,'model_id',CHtml::listData(Models::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
            <?php echo $form->error($model,'model_id'); ?>
    </div>
<br />
<br />
<br />
<br />
    <div class="col-md-6">
	<?php echo $form->labelEx($model,'sale_date'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'sale_date',
                            'value'=>$model->sale_date,
                            'language' => 'en',
                            'htmlOptions' => array('readonly'=>"readonly",),
                            'options'=>array(
                                    'autoSize'=>'true',                                    
                                    'defaultDate'=>$model->sale_date,
                                    'dateFormat'=>'yy-mm-dd',
                                    'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
                                    'buttonImageOnly'=>'true',
                                    'buttonText'=>'Seleccionar Fecha',
                                    'selectOtherMonths'=>'true',
                                    'showAnim'=>'fold',//slide
                                    'showButtonPanel'=>'true',
                                    'showOn'=>'button',
                                    'showOtherMonths'=>'true',
                                    'showOtherYears'=>'true',
                                    'changeMonth' => 'true',
                                    'changeYear' => 'true',
                                    'minDate'=>'-100Y', //fecha minima
                                    'maxDate'=>'0' , //fecha maxima
                            ),
                    )); ?>
	<?php echo $form->error($model,'sale_date'); ?>
    </div>
    <div class="col-md-6">
	<?php echo $form->labelEx($model,'bill_sale'); ?>
	<?php echo $form->textField($model,'bill_sale',array('size'=>45,'maxlength'=>45)); ?>
	<?php echo $form->error($model,'bill_sale'); ?>
    </div>
    <br /><br />
    <br /><br />

  </div>

<br />
 <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'distributor_id'); ?>
            <?php echo $form->dropDownList($model, 'distributor_id', CHtml::listData(Distributors::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty' => 'Seleccione')); ?>
            <?php echo $form->error($model, 'distributor_id'); ?>
        </div>        
    </div>
<br /><br />
<div class="btn-group">
    <?php echo CHtml::Button(Yii::app()->params['cancel-text'],array('class'=>Yii::app()->params['cancel-btn'],'onclick'=>'history.back(-1)')); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Importar' : 'Importar', array('class' =>Yii::app()->params['save-btn'])); ?> 
</div>  
<?php $this->endWidget(); ?>