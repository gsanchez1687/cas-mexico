<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#roles-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><b>Administardor de Roles</b></h3>        
    </div>
    <div class="panel-body">
   <?php echo CHtml::link('Agregar nuevo rol', array('roles/create'), array('class' => 'btn btn-primary')); ?>      

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'roles-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'description',
		'name',
		array('name' => 'active','type' => 'raw','value' => 'Active::checkSwicth($data->active,$data->id)', 'filter' => Active::getListActive(),'htmlOptions' => array('class' => 'switchactive')),		
		array(
                    'class' => 'CLinkColumn',
                    'header' => 'Detalles',
                    'label' => Yii::app()->params['view-icon'],
                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                // 'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_view')
                ),
            array(
                    'class' => 'CLinkColumn',
                    'header' => 'Editar',
                    'label' => Yii::app()->params['update-icon'],
                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['update-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                // 'visible' => @$visible_update
                ),
                array(
                    'class' => 'CLinkColumn',
                    'header' => 'Eliminar',
                    'label' => Yii::app()->params['delete-icon'],
                    'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['delete-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
                //'visible' => @$visible_delete
                ),
	),
)); ?>
    </div>
</div>

