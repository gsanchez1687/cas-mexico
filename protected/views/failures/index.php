<?php
/* @var $this FailuresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Failures',
);

$this->menu=array(
	array('label'=>'Create Failures', 'url'=>array('create')),
	array('label'=>'Manage Failures', 'url'=>array('admin')),
);
?>

<h1>Failures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
