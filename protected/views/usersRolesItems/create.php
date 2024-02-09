<?php
/* @var $this UsersRolesItemsController */
/* @var $model UsersRolesItems */

$this->breadcrumbs=array(
	'Users Roles Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersRolesItems', 'url'=>array('index')),
	array('label'=>'Manage UsersRolesItems', 'url'=>array('admin')),
);
?>

<h1>Create UsersRolesItems</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>