<?php
/* @var $this BranchesController */
/* @var $model Branches */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Branches', 'url'=>array('index')),
	array('label'=>'Manage Branches', 'url'=>array('admin')),
);
?>

<h1>Create Branches</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>