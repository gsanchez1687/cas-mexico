<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title"><?php echo $this->modulo_icon; ?> Administrar <?php echo $this->modulo_name; ?></div>            
            <div class="col-xs-9"></div>           
        </div>
    </div>
    <div class="panel-body">
 <?php echo CHtml::link('Permisos por Usuarios', array('menus/user'),array('class'=>'btn btn-primary')); ?>
        <?php echo CHtml::link('Nuevo Permisos por Roles', array('menus/rolesitems/create'),array('class'=>'btn btn-primary')); ?>        
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Items <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo CHtml::link('Items', array('items/admin')); ?></li>               
                <li class="divider"></li>
                <li><?php echo CHtml::link('Nuevo Items', array('items/create')); ?></li>
            </ul>
        </div>
        <br />
        <br />
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'items-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="row">
            <div class="col-sm-2 col-separacion">
                Seleccionar Todos
            </div>
            <div class="col-sm-10 col-separacion">
                <?php
                $this->widget('application.extensions.SwitchToggleJD.SwitchToggleJD', array(
                    'attribute' => 'rowSelectAll',
                    'type' => 'selectall',
                    'state' => FALSE,
                        )
                );
                ?>
            </div>
        </div>


        <div class="row">

            <?php foreach ($options as $menu) { ?>
                <div class="col-md-12 col-separacion" id="<?php echo @$menu['menu']; ?>">
                    <h4><?php echo @$menu['menuicon']; ?> <?php echo @$menu['menu']; ?></h4>
                </div>

                <?php foreach ($options[$menu['menu']]['data'] as $opcion) { ?>

                    <div class="col-md-3 col-separacion">
                        <p class="text-right"><?php echo @$opcion['name']; ?></p>
                    </div>
                    <div class="col-md-1 col-separacion">
                        <?php
                            $this->widget('application.extensions.SwitchToggleJD.SwitchToggleJD', array(
                            'id' => @$opcion['opcion'],
                            'attribute' => 'UsersRolesItems[' . @$opcion['opcion'] . ']',
                            'state' => @$opcion['value'],
                            'type' => 'item',
                            'coloron' => 'color1',
                            'htmlOptions' => array('class' => 'itemch'),
                                )
                        );
                        ?>
                        <?php echo $form->error($model, 'itemname'); ?>
                    </div>
            
                <?php } ?>
            <div class="clearfix"></div>
                <hr />

            <?php } ?>   
                
        </div>
        <div class="clearfix"></div>
        <div class="row" >
            <div class="col-md-12 col-separacion text-right">
                <?php echo CHtml::htmlButton('Guardar', array('class' => 'btn btn-primary ' , 'Type' => 'submit')); ?>
                <?php echo CHtml::link('Cancelar', CHttpRequest::getUrlReferrer() ? CHttpRequest::getUrlReferrer() : Yii::app()->baseUrl, array('class' => 'btn btn-primary ')); ?>
            </div>
        </div>
        <p class="note text-right" >Los campos con <span class="required"><span>*</span></span> son obligatorios.</p>


        <?php $this->endWidget(); ?>
    </div>
</div>