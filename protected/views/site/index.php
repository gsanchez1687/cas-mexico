<?php if(Yii::app()->authRBAC->checkAccess('notificacion_pieza')){ ?>  
<script>
    $(document).ready(function () {
        alerts();
    });

    function alerts() {
        var vector = $(".request").val();       
        if (vector != 0) {
            Messenger().post({               
                message: 'Tiene ' + vector + ' Solicitudes de Partes y Piezas por aprobar',
                type: 'info',
                hideAfter: 300,
                showCloseButton: true
            });
        }
    }


</script>
<?php } ?>
<input type="hidden" class="request" value="<?php echo $vector1; ?>">
<div class="panel-body">    
    <?php if(Yii::app()->authRBAC->checkAccess('requests_admin')){ ?>    
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Entrega de Partes y Piezas</h3>                
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/requests/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">
                     <i  class="fa fa-2x fa-truck"></i>                                 
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
   
    <?php if(Yii::app()->authRBAC->checkAccess('warranties_admin')){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reclamación de Garantía</h3>               
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/warranties/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">
                     <i class="fa fa-2x fa-list"></i>
                   
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
     <?php if(Yii::app()->authRBAC->checkAccess('devices_admin')){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Equipos</h3>                
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/devices/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">
                     <i class="fa fa-2x fa fa-print"></i>
                   
                </div>
            </a>
        </div>
    </div>
    <?php } ?>

     <?php if(Yii::app()->authRBAC->checkAccess('users_admin')){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Usuarios</h3>                
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/users/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">
                     <i class="fa fa-2x fa-user"></i>                                                
                </div>
            </a>
        </div>
    </div>
     <?php } ?>
    
    <?php if(Yii::app()->authRBAC->checkAccess('distributors_admin')){ ?>    
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Distribuidor</h3>                
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/distributors/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">
                     <i class="fa fa-2x fa-briefcase"></i>                                 
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
  
    
    
    <?php if(Yii::app()->authRBAC->checkAccess('log_index')){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Logs del Sistema CAS</h3>                
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/logs/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">                 
                     <i class="fa fa-2x fa-user-secret"></i>                   
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
    <?php if(Yii::app()->authRBAC->checkAccess('roles_admin')){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Administrador de Roles y Permisos </h3>                
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/menus/rolesitems/create"?>">
                <div class="btn btn-block btn-success btn-trans-panel">                 
                     <i class="fa fa-2x  fa-lock"></i>                   
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
    <?php if(Yii::app()->authRBAC->checkAccess('failures_admin')){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Fallas</h3>                
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/failures/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">                 
                     <i class="fa fa-2x  fa-bolt"></i>                   
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
    
    <!--panel para los usuario tipo cas-->
    
    <?php if(Yii::app()->authRBAC->checkAccess('warranties_admin_cas')){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reclamación de Garantía</h3>               
            </div>
            <a href="<?php echo Yii::app()->baseUrl."/warranties/admin"?>">
                <div class="btn btn-block btn-success btn-trans-panel">
                     <i class="fa fa-2x fa-list"></i>
                   
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
    

    <?php if (Yii::app()->authRBAC->checkAccess('requests_cas')) { ?>    
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Entrega de Partes y Piezas</h3>                
                </div>
                <a href="<?php echo Yii::app()->baseUrl . "/requests/cas" ?>">
                    <div class="btn btn-block btn-success btn-trans-panel">
                        <i  class="fa fa-2x fa-truck"></i>                                 
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>

    <?php if (Yii::app()->authRBAC->checkAccess('mytechnician_admin')) { ?>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Empleados</h3>               
                </div>
                <a href="<?php echo Yii::app()->baseUrl . "/users/mytechnician" ?>">
                    <div class="btn btn-block btn-success btn-trans-panel">
                        <i class="fa fa-2x fa-user"></i>             
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
    <?php if (Yii::app()->authRBAC->checkAccess('devices_mydevice')) { ?>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Mis Equipos</h3>                
                </div>
                <a href="<?php echo Yii::app()->baseUrl . "/devices/mydevice" ?>">
                    <div class="btn btn-block btn-success btn-trans-panel">
                        <i class="fa fa-2x fa fa-print"></i>

                    </div>
                </a>
            </div>
        </div>
    <?php } ?>

    <!--panel para los usuario tipo cas-->
   
    
</div>