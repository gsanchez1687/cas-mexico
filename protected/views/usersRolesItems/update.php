<?php
/* @var $this UsersRolesItemsController */
/* @var $model UsersRolesItems */

$this->breadcrumbs=array(
	'Users Roles Items'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersRolesItems', 'url'=>array('index')),
	array('label'=>'Create UsersRolesItems', 'url'=>array('create')),
	array('label'=>'View UsersRolesItems', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersRolesItems', 'url'=>array('admin')),
);
?>

<h1>Update UsersRolesItems <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>