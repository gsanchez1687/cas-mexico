<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#logs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">log del cAS</h3>        
    </div>
    <div class="panel-body">
        <div class="search-form" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>
        </div><!-- search-form -->

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'logs-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'modulo',
                'activity',
                'country',
                'ip',
                'date',
                'device',
            ),
        ));
        ?>
    </div>
</div>
