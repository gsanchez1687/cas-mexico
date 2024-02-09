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
    <div class="panel-heading">
        <h3 class="panel-title"><b>Administardor de Usuarios</b></h3>        
    </div>
    <div class="panel-body">
       <?php echo CHtml::link('Agregar nuevo usuario', array('users/create'), array('class' => 'btn btn-primary')); ?>        
       <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',       
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'username',		
		'name',
//		'lastname',
//		'email',		
		'phone_local',
		'phone_personal',		
                array('name' => 'rol_id', 'value' => '$data->rol->name', 'type' => 'text', 'filter' => CHtml::listData(Roles::model()->findAll('active = 1'), "id", "name")),
                array('name' => 'status','type' => 'raw','value' => 'Active::checkSwicth($data->status,$data->id)', 'filter' => Active::getListActive(),'htmlOptions' => array('class' => 'switchactive')),		
		array(
                    'class' => 'CLinkColumn',
                    'header' => 'Detalles',
                    'label' => Yii::app()->params['view-icon'],
                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                    'visible' => Yii::app()->authRBAC->checkAccess('users_view')
                ),
		 array(
                    'class' => 'CLinkColumn',
                    'header' => 'Permisos',
                    'label' => '<i class="fa fa-toggle-on"></i>',
                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("menus/usersitems/",array("id"=>$data->id))',
                    'visible' => Yii::app()->authRBAC->checkAccess('users_acceso')
                ),
                array(
                    'class' => 'CLinkColumn',
                    'header' => 'Editar',
                    'label' => Yii::app()->params['update-icon'],
                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['update-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                    'visible' => Yii::app()->authRBAC->checkAccess('users_update')
                ),
                array(
                    'class' => 'CLinkColumn',
                    'header' => 'Eliminar',
                    'label' => Yii::app()->params['delete-icon'],
                    'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['delete-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
                    'visible' => Yii::app()->authRBAC->checkAccess('users_delete')
                ),
	),
)); ?>

    </div>
</div>



