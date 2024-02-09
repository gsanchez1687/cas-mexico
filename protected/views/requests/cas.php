<?php
Yii::app()->params['IDGridview'] = 'requests-grid';
Yii::app()->params['rutaUrlGridviewBoxSwitch'] = Yii::app()->controller->createUrl('updateActive');
$active = array('0' => 'Inactivos', '1' => 'Activos');
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#requests-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Control de Entrega de Partes y Piezas</h3>     
    </div>

   
    <div style="padding-left: 15px;" class="alert_success"></div>
    <div style="padding-left: 15px;" class="alert_warning"></div>
    <div class="panel-body">
            <?php echo CHtml::link('Listado RMA', array('warranties/cas'), array('class' => 'btn btn-primary btn-3d')); ?>           
            <?php echo CHtml::link('Listado de mis técnicos', array('users/mytechnician'), array('class' => 'btn btn-primary btn-3d')); ?> 

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'requests-grid',
            'dataProvider' => $model->cas(),
            'filter' => $model,
            'columns' => array(
                array('name' => 'warranty_id', 'value' => '$data->warranty->code', 'type' => 'html'),
                array('name' => 'failure_id', 'value' => '$data->failure->replacement', 'type' => 'text'),
               // array('name' => 'failure_id', 'header' => 'Descripción Pieza', 'value' => '$data->failure->description_replacement', 'type' => 'text'),                               
                'tracking',
                array('name' => 'transport_id', 'value' => '$data->transport->name', 'type' => 'text', 'filter' => CHtml::listData(Transports::model()->findAll(), "id", "name")),
                array('name' => 'status','type' => 'raw','value' => 'Requests::pieza($data->status)','visible' => Yii::app()->authRBAC->checkAccess("requests_ver"),'filter' => Active::getListActive(),'htmlOptions' => array('')),
//                array('name' => 'status','type' => 'raw','value' => 'Active::checkSwicth($data->status,$data->id)','visible' => Yii::app()->authRBAC->checkAccess("requests_active"), 'filter' => Active::getListActive(),'htmlOptions' => array('class' => 'switchactive')),
                array(
                    'class' => 'CLinkColumn',
                    'header' => 'Editar',
                    'label' => Yii::app()->params['falla'],
                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['update-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                    'visible' => Yii::app()->authRBAC->checkAccess("requests_edit"),
                ),
            ),
        ));
        ?>
    </div>
</div>