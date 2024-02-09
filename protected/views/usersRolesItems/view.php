<?php
/* @var $this UsersRolesItemsController */
/* @var $model UsersRolesItems */

$this->breadcrumbs=array(
	'Users Roles Items'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersRolesItems', 'url'=>array('index')),
	array('label'=>'Create UsersRolesItems', 'url'=>array('create')),
	array('label'=>'Update UsersRolesItems', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersRolesItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersRolesItems', 'url'=>array('admin')),
);
?>

<h1>View UsersRolesItems #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'rol_item_id',
		'active',
	),
)); ?>
