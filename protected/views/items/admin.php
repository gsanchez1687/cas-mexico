<script src="<?php echo Yii::app()->baseUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>        
<script src="<?php echo Yii::app()->baseUrl ?>/js/vendor/jquery-1.11.1.min.js"></script>
<?php
Yii::app()->params['IDGridview'] = 'items-grid';
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
	$('#items-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Items Admin</h3>        
    </div>
    <div class="panel-body">        
        <?php echo CHtml::link('Permisos por Usuarios', array('menus/user'),array('class'=>'btn btn-primary')); ?>
        <?php echo CHtml::link('Nuevo Permisos por Roles', array('menus/rolesitems/create'),array('class'=>'btn btn-primary')); ?>        
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Items <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo CHtml::link('Items', array('items/admin')); ?></li>               
                <li class="divider"></li>
                <li><?php echo CHtml::link('Nuevo Items', array('items/create')); ?></li>
            </ul>
        </div>  
         <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Módulos <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo CHtml::link('Módulo', array('menus/admin')); ?></li>               
                <li class="divider"></li>
                <li><?php echo CHtml::link('Nuevo Módulo', array('menus/create')); ?></li>
            </ul>
        </div>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'items-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'itemsCssClass' => 'table table-striped table-bordered table-hover',
            'pagerCssClass' => 'paginatione',
            'columns' => array(
                'item',
                'name',
                array('name' => 'menu_id', 'value' => '$data->menu->name', 'type' => 'text', 'filter' => CHtml::listData(Menus::model()->findAll('active = 1'), "id", "name")),                
                array(
                'name' => 'active',
                'type' => 'raw',
                'value' => 'Active::checkSwicth($data->active,$data->id)', 'filter' => Active::getListActive(),
                'htmlOptions' => array('class' => 'switchactive')
                ),	
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
        ));
        ?>

    </div>
</div>
