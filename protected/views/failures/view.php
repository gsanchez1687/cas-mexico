<h1>View Failures #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'brand_id',
		'model_id',
		'description_failure',
		'solution',
		'replacement',
		'description_replacement',
		'active',
	),
)); ?>
