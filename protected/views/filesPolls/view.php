<?php
/* @var $this FilesPollsController */
/* @var $model FilesPolls */

$this->breadcrumbs=array(
	'Files Polls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FilesPolls', 'url'=>array('index')),
	array('label'=>'Create FilesPolls', 'url'=>array('create')),
	array('label'=>'Update FilesPolls', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FilesPolls', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FilesPolls', 'url'=>array('admin')),
);
?>

<h1>View FilesPolls #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'file',
		'warranty_id',
		'created',
	),
)); ?>
