<h1>View Requests #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'failure_id',
		'warranty_id',
		'status',
		'tracking',
		'comments',
		'date_initial',
		'date_final',
	),
)); ?>
