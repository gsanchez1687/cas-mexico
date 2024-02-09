<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Actualizar Parte y Piezas <strong><?php echo $model->failure->replacement." - ".$model->failure->description_replacement ?></strong></h3>
      
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
