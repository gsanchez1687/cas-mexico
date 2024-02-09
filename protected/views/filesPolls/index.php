<?php
/* @var $this FilesPollsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Files Polls',
);

$this->menu=array(
	array('label'=>'Create FilesPolls', 'url'=>array('create')),
	array('label'=>'Manage FilesPolls', 'url'=>array('admin')),
);
?>

<h1>Files Polls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
