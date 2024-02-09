<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Actualizar datos del CAS <strong><?php echo $model->name; ?></strong></h3>       
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model' => $model,'User'=>$User)); ?>
    </div>
</div>
