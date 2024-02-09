<?php
Yii::app()->params['IDGridview'] = 'failures-grid';
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
	$('#failures-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-exclamation-triangle"></i> Fallas de equipos</h3>        
    </div>
    <div class="panel-body">
        <?php echo CHtml::link('Cargar masiva de fallas', array('failures/importfailures'), array('class' => 'btn btn-primary')); ?>        
        <?php echo CHtml::link('Agregar una falla', array('failures/create'), array('class' => 'btn btn-primary')); ?>        
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'failures-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                array('name' => 'brand_id', 'value' => '$data->brand->name', 'type' => 'text', 'filter' => CHtml::listData(Brands::model()->findAll(), "id", "name")),
		array('name' => 'model_id', 'value' => '$data->model->name', 'type' => 'text', 'filter' => CHtml::listData(Models::model()->findAll(), "id", "name")),
                'description_failure',
                'solution',
                'replacement',
                'description_replacement',
                array('name' => 'active', 'type' => 'raw','value' => 'Active::checkSwicth($data->active,$data->id)', 'filter' => Active::getListActive(),'htmlOptions' => array('class' => 'switchactive')),	
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
                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['delete-btn']),
                    'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
                // 'visible' => @$visible_update
                ),
            ),
        ));
        ?>
    </div>
</div>

