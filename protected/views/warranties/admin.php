<?php




Yii::app()->params['IDGridview'] = 'warranties-grid';
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
	$('#warranties-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
phpinfo();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Reclamación de Garantía</h3>        
    </div>
    <div class="panel-body">
        <?php  if(Yii::app()->authRBAC->checkAccess('warranties_create')){ ?>
            <?php echo CHtml::link('Nuevo RMA', array('warranties/create'), array('class' => 'btn btn-primary btn-3d')); ?> 
            <?php echo CHtml::link('Listado de piezas aprobadas', array('requests/admin'), array('class' => 'btn btn-primary btn-3d')); ?> 
            <?php echo CHtml::link('Listado de mis técnicos', array('users/mytechnician'), array('class' => 'btn btn-primary btn-3d')); ?> 
        <?php }
        ?>
        
        
    <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'warranties-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            
           
		array('name'=>'code','type'=>'raw','value' => '$data->code'),	
                array('name'=>'customer_id','value' => '$data->customer->name','type' => 'text'),
		array('name'=>'cas_id','value' => '$data->cas->name','type' => 'text'),
		array('name'=>'device_id','value' => '$data->device->name','type' => 'text'),		
                array('name'=>'statu_id','type' => 'raw','value' => 'Status::estado($data->statu_id)','filter' => CHtml::listData(Status::model()->findAll(), "id", "name"),'htmlOptions' => array('class' => '')),
		array(
                    'class' => 'CLinkColumn',
                    'header' => 'Planilla',
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
                    'visible' => Yii::app()->authRBAC->checkAccess('warrenties_reparar_falla'),
                ),
              
                array(
                    'class' => 'CLinkColumn',
                    'header' => 'Cerrar RMA',
                    'label' => '<i class="fa fa-lock"></i>',
                   'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['update-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("cerrarrma",array("id"=>$data->id))',
                    'visible' =>Yii::app()->authRBAC->checkAccess('warrenties_cerrar_rma'),
                ),

	),
)); ?>
    </div>
</div>