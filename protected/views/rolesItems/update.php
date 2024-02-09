<?php
/* @var $this RolesItemsController */
/* @var $model RolesItems */

$this->breadcrumbs=array(
	'Roles Items'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RolesItems', 'url'=>array('index')),
	array('label'=>'Create RolesItems', 'url'=>array('create')),
	array('label'=>'View RolesItems', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RolesItems', 'url'=>array('admin')),
);
?>

<h1>Update RolesItems <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>