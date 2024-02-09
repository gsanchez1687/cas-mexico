<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> <?php echo $model->item; ?></h3>
        <div class="actions pull-right">
            <i class="fa fa-expand"></i>
            <i class="fa fa-chevron-down"></i>
            <i class="fa fa-times"></i>
        </div>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item"><span>Item: </span> <?php echo $model->item; ?></li>
            <li class="list-group-item"><span>Nombre: </span><?php echo $model->name; ?></li>
            <li class="list-group-item"><span>Menu: </span><?php echo $model->menu->name; ?></li>
            <li class="list-group-item"><?php echo Active::checkSwicthLabel($model->active); ?></li>            
        </ul>
        <?php echo CHtml::link('Lista de Items', array('items/admin'), array('class' => 'btn btn-primary')); ?>
    </div>
</div>