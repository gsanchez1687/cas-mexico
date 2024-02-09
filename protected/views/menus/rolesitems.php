<script src="<?php echo Yii::app()->baseUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>        
<script src="<?php echo Yii::app()->baseUrl ?>/js/vendor/jquery-1.11.1.min.js"></script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Permisos por Roles</h3>
        <div class="actions pull-right">
            <i class="fa fa-expand"></i>
            <i class="fa fa-chevron-down"></i>
            <i class="fa fa-times"></i>
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
        <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Módulos <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo CHtml::link('Módulo', array('menus/admin')); ?></li>               
                <li class="divider"></li>
                <li><?php echo CHtml::link('Nuevo Módulo', array('menus/create')); ?></li>
            </ul>
        </div>
    </div>
    
</div>




<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title"><?php echo $this->modulo_icon; ?>  </div>            
            <div class="col-xs-9"> 
                <?php echo CHtml::link('Lista de roles', array('roles/admin'),array('class'=>'btn btn-primary')); ?>  
                <div class="tool-button">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => $this->menu,
                        'encodeLabel' => FALSE,
                        'htmlOptions' => array('class' => 'cmenuhorizontal'),
                    ));
                    ?>
                </div>
            </div>           
        </div>
    </div>
    <div class="panel-body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'items-form',
            'enableAjaxValidation' => false,
        ));
        ?>

        <div class="row"  style="margin-top: 10px;">
            <div class="col-xs-3 col-separacion">
                <?php echo $form->labelEx($model, 'rol_id'); ?>
            </div>
            <div class="col-xs-9 col-separacion">
                <?php echo $form->dropDownList($model, 'rol_id', Roles::getListRoles(), array('class' => 'form-control', 'prompt' => 'Seleccione', 'onchange' => 'this.form.submit()')); ?>
                <?php echo $form->error($model, 'rol_id'); ?>
            </div>
        </div>
  

        <?php if ($model->rol_id != NULL) { ?>

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


            <?php foreach ($options as $menu) { ?>
                <div class="row">
                    <div class="col-md-12 col-separacion" id="<?php echo $menu['menu']; ?>">
                        <hr class="hrblack" />
                        <h4><?php echo $menu['menuicon']; ?> <?php echo $menu['menu']; ?></h4>

                    </div>
                </div>
                <div class="row">
                    <?php foreach ($options[$menu['menu']]['data'] as $opcion) { ?>

                        <div class="col-sm-2 col-separacion">
                            <p class="text-right"><?php echo @$opcion['name']; ?></p>
                        </div>
                        <div class="col-sm-1 col-separacion">
                            <?php
                            $this->widget('application.extensions.SwitchToggleJD.SwitchToggleJD', array(
                                'id' => @$opcion['opcion'],
                                'attribute' => 'Items[' . @$opcion['opcion'] . ']',
                                'state' => $opcion['value'],
                                'type' => 'item',
                                'coloron' => 'color1',
                                    )
                            );
                            ?>
                            <?php echo $form->error($model, 'itemname'); ?>
                        </div>
                    <?php } ?>
                </div>
                <hr />

            <?php } ?>    
        </div>

        <div class="clearfix"></div>
        <div class="row" >
            <div class="col-md-12 col-separacion text-right">
                <?php echo CHtml::htmlButton('Guardar', array('class' => 'btn btn-primary ', 'Type' => 'submit')); ?>
                <?php echo CHtml::link('Cancelar', CHttpRequest::getUrlReferrer() ? CHttpRequest::getUrlReferrer() : Yii::app()->baseUrl, array('class' => 'btn btn-primary ')); ?>
            </div>
        </div>
        
    <?php } ?>

    <?php $this->endWidget(); ?>
</div>           
</div>

