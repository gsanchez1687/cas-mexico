<?php
/* @var $this RolesItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Roles Items',
);

$this->menu=array(
	array('label'=>'Create RolesItems', 'url'=>array('create')),
	array('label'=>'Manage RolesItems', 'url'=>array('admin')),
);
?>

<h1>Roles Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
