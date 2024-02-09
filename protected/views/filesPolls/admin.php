<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#files-polls-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Encuestas realizadas</h3>        
    </div>
    <div class="panel-body">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'files-polls-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            array('name' => 'warranty_id', 'value' => '$data->warranty->code', 'type' => 'text', 'filter' => CHtml::listData(Warranties::model()->findAll(), "id", "code")),
            array(
                    'header'=>'Imagen',
                    'name'  => 'file',
                    'value' => 'CHtml::link($data->file,Yii::app()->createUrl("",array("encuestas"=>$data->file)),array("class"=>"btn btn-primary"))',
                    'type'  => 'raw',       
                     ),
		
		//'created',
		array(
                    'class' => 'CLinkColumn',
                    'header' => 'Editar',
                    'label' => Yii::app()->params['falla'],
                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['update-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                    'visible' => Yii::app()->authRBAC->checkAccess("requests_edit"),
                ),
	),
)); ?>
    </div>
</div>
