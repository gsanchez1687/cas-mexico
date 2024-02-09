<script src="<?php echo Yii::app()->baseUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>        
<script src="<?php echo Yii::app()->baseUrl ?>/js/vendor/jquery-1.11.1.min.js"></script>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menus-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Permisos por Usuarios</h3>
        <div class="actions pull-right">
            <i class="fa fa-expand"></i>
            <i class="fa fa-chevron-down"></i>
            <i class="fa fa-times"></i>
        </div>
    </div>
    <div class="panel-body">
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
    </div>
        
        
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'menus-grid',
            'dataProvider' => $users->search(),
            'filter' => $users,
            'columns' => array(
                array(
                    'name' => 'rol_id',
                    'value' => '$data->rol->name',
                    'type' => 'text',
                    'filter' => CHtml::listData(Roles::model()->findAll(), "id", "name")
                ),
                'email',
                'username',
                array(
                    'class' => 'CLinkColumn',
                    'header' => 'Ver',
                    'label' => 'Enlace',
                    'linkHtmlOptions' => array('class' => 'view btn btn-primary'),
                    'urlExpression' => 'Yii::app()->controller->createUrl("usersitems",array("id"=>$data->id))',
                ),
            ),
        ));
        ?>
    </div>
</div>
