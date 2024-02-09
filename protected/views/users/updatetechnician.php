<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Actualizar datos del empleado <strong><?php echo $model->name?></strong></h3>
        <div class="actions pull-right">
            <i class="fa fa-expand"></i>
            <i class="fa fa-chevron-down"></i>
            <i class="fa fa-times"></i>
        </div>
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_formupdatetechnician', array('model' => $model)); ?>
    </div>
</div>
