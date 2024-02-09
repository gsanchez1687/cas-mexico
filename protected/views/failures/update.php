<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Falla <strong><?php echo $model->replacement?></strong></h3>        
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
