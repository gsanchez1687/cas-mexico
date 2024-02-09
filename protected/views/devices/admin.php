<?php
Yii::app()->params['IDGridview'] = 'devices-grid';
Yii::app()->params['rutaUrlGridviewBoxSwitch'] = Yii::app()->controller->createUrl('updateActive');
$active = array('0'=>'Inactivos','1'=>'Activos');

foreach($active as $key => $value){
    $listData[$key]=$value;
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#devices-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Equipos</h3>        
    </div>
    <div class="panel-body">
<?php echo CHtml::link('Nuevo equipo', array('devices/create'), array('class' => 'btn btn-primary')); ?>        
<?php echo CHtml::link('Carga Masiva de Equipos', array('devices/importcsv'), array('class' => 'btn btn-primary')); ?>        
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'devices-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
                //array('name' => 'category_id', 'value' => '$data->category->name', 'type' => 'text', 'filter' => CHtml::listData(Categories::model()->findAll(), "id", "name")),
                array('name' => 'brand_id', 'value' => '$data->brand->name', 'type' => 'text', 'filter' => CHtml::listData(Brands::model()->findAll(), "id", "name")),
		array('name' => 'model_id', 'value' => '$data->model->name', 'type' => 'text', 'filter' => CHtml::listData(Models::model()->findAll(), "id", "name")),
		'name',				
                
		'sale_date',
                'bill_sale',
            array('name' => 'active', 'type' => 'raw','value' => 'Active::checkSwicth($data->active,$data->id)', 'filter' => Active::getListActive(),'htmlOptions' => array('class' => 'switchactive')),	
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


