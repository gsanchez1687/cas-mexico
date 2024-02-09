<div class="container-fluid">
  <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Detalles del Equipo <?php echo $model->name; ?></h3>
        <div class="actions pull-right">
            <i class="fa fa-expand"></i>
            <i class="fa fa-chevron-down"></i>
            <i class="fa fa-times"></i>
        </div>
    </div>
    <div class="panel-body">       
           <table class="table table-hover">
                <tr>                   
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Serial</td>
                    <td>Fecha de Venta</td>
                    <td>Factuta de Venta</td>
                    <td>Estado</td>
                </tr>
                <tr>
                    <td><strong><?php echo $model->brand->name; ?></strong></td>
                    <td><strong><?php echo $model->model->name ?></strong></td>
                    <td><strong><?php echo $model->name; ?></strong></td>
                    <td><strong><?php echo $model->sale_date; ?></strong></td>
                    <td><strong><?php echo $model->bill_sale; ?></strong></td>
                    <td><strong><?php echo $model->active; ?></strong></td>
                </tr>
            </table>        
        <?php echo CHtml::link('Administrador', array('devices/admin'), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Actualizar datos', array('devices/update/'.$model->id), array('class' => 'btn btn-primary')); ?>
    </div>
</div>
</div>