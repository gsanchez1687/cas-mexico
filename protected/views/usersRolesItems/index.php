<?php
/* @var $this UsersRolesItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Roles Items',
);

$this->menu=array(
	array('label'=>'Create UsersRolesItems', 'url'=>array('create')),
	array('label'=>'Manage UsersRolesItems', 'url'=>array('admin')),
);
?>

<h1>Users Roles Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
