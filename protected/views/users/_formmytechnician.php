<?php
Yii::app()->params['IDGridview'] = 'users-grid';
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
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    
    <div class="panel-body">
       <?php echo CHtml::link('Agregar nuevo empleado', array('users/technician'), array('class' => 'btn btn-primary btn-3d')); ?>        
       <?php echo CHtml::link('Lista RMA', array('warranties/cas'), array('class' => 'btn btn-primary btn-3d')); ?>       
        <?php if(Yii::app()->authRBAC->checkAccess('requests_partes_pieza_cas')): ?>
            <?php echo CHtml::link('Lista de partes y piezas', array('requests/cas'), array('class' => 'btn btn-primary btn-3d')); ?>    
        <?php endif; ?>           
       <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',       
	'dataProvider'=>$model->technician(),
	'filter'=>$model,
	'columns'=>array(		
		'username',		
		'name',
		'lastname',
		'email',		
		'phone_local',
		'phone_personal',		
                array('name' => 'rol_id', 'value' => '$data->rol->name', 'type' => 'raw', 'filter' => CHtml::listData(Roles::model()->findAll('active = 1'), "id", "name")),
                array('name' => 'status','type' => 'raw','value' => 'Active::checkSwicth($data->status,$data->id)', 'filter' => Active::getListActive(),'htmlOptions' => array('class' => 'switchactive')),		
		array(
                    'class' => 'CLinkColumn',
                    'header' => 'Detalles',
                    'label' => Yii::app()->params['view-icon'],
                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("viewtechnician",array("id"=>$data->id))',
                // 'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_view')
                ),
                array(
                    'class' => 'CLinkColumn',
                    'header' => 'Editar',
                    'label' => Yii::app()->params['update-icon'],
                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['update-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("updatetechnician",array("id"=>$data->id))',
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



