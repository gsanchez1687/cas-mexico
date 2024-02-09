
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> <?php echo $model->name; ?></h3>     
    </div>
    <div class="panel-body">
        <table class="table table-hover">
                <tr>
                    <td>Nombre</td>
                    <td>Dirección</td>
                    <td>Teléfono Local</td>
                    <td>Teléfono Personal</td>
                    <td>Correo</td>                   
                    <td>Registro Fiscal</td>
                    <td>Categoria</td>
                    <td>Estado</td>
                </tr>
                <tr>
                    <td><strong><?php echo $model->name; ?></strong></td>
                    <td><strong><?php echo $model->address; ?></strong></td>
                    <td><strong><?php echo $model->phone_local; ?></strong></td>
                    <td><strong><?php echo $model->phone_personal; ?></strong></td>
                    <td><strong><?php echo $model->email; ?></strong></td>
                    <td><strong><?php echo $model->record_fiscal; ?></strong></td>
                    <td><strong><?php echo $model->category->name; ?></strong></td>
                    <td><strong><?php echo $model->active; ?></strong></td>
                </tr>
            </table>        
   
        
        <?php echo CHtml::link('Administrador', array('cas/admin'), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Actualizar datos', array('cas/update/'.$model->id), array('class' => 'btn btn-primary')); ?>
    </div>
</div>