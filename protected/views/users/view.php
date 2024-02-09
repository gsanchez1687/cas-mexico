<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> <?php echo $model->name." ".$model->lastname; ?></h3>       
    </div>
    <div class="panel-body">
        <table class="table table-hover">
                <tr>
                    <td>Foto</td>
                    <td>Nombre de Usuario</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Correo</td>
                    <td>Teléfono Local</td>
                    <td>Teléfono Personal</td>
                    <td>Direccion</td>
                </tr>
                <tr>
                    <td> <?php echo CHtml::image(Yii::app()->baseUrl.'/uploads/'.$model->file, 'Logo',array('width'=>'35px')); ?></td>
                    <td><strong><?php echo $model->username; ?></strong></td>
                    <td><strong><?php echo $model->name; ?></strong></td>
                    <td><strong><?php echo $model->lastname; ?></strong></td>
                    <td><strong><?php echo $model->email; ?></strong></td>
                    <td><strong><?php echo $model->phone_local; ?></strong></td>
                    <td><strong><?php echo $model->phone_personal; ?></strong></td>
                    <td><strong><?php echo $model->address; ?></strong></td>
                </tr>
            </table>        
   
        
        <?php echo CHtml::link('Lista de usuarios', array('users/admin'), array('class' => 'btn btn-primary btn-3d')); ?>
        <?php echo CHtml::link('Actualizar datos', array('users/update/'.$model->id), array('class' => 'btn btn-primary btn-3d')); ?>
    </div>
</div>