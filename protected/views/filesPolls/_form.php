<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'files-polls-form','enableAjaxValidation'=>false,'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div>
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->FileField($model, 'file', array('size' => 45, 'maxlength' => 45)); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>
        <output id="list"></output>
	

	<div class="btn-group">
        <?php echo CHtml::Button(Yii::app()->params['cancel-text'],array('class'=>Yii::app()->params['cancel-btn'],'onclick'=>'history.back(-1)')); ?>	
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params['crear-text'] : Yii::app()->params['actualizar-text'],array('class'=>Yii::app()->params['save-btn'])); ?>
       </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
function archivo(e){for(var t,n=e.target.files,a=0;t=n[a];a++)if(t.type.match("image.*")){var i=new FileReader;i.onload=function(e){return function(t){document.getElementById("list").innerHTML=['<img class="thumbnail" src="',t.target.result,'" title="',escape(e.name),'"/>'].join("")}}(t),i.readAsDataURL(t)}}document.getElementById("FilesPolls_file").addEventListener("change",archivo,!1);
</script>