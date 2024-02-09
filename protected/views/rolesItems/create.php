<?php
/* @var $this RolesItemsController */
/* @var $model RolesItems */

$this->breadcrumbs=array(
	'Roles Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RolesItems', 'url'=>array('index')),
	array('label'=>'Manage RolesItems', 'url'=>array('admin')),
);
?>

<h1>Create RolesItems</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>