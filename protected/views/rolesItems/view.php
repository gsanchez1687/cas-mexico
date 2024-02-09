<?php
/* @var $this RolesItemsController */
/* @var $model RolesItems */

$this->breadcrumbs=array(
	'Roles Items'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RolesItems', 'url'=>array('index')),
	array('label'=>'Create RolesItems', 'url'=>array('create')),
	array('label'=>'Update RolesItems', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RolesItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RolesItems', 'url'=>array('admin')),
);
?>

<h1>View RolesItems #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rol_id',
		'item_id',
		'active',
	),
)); ?>
