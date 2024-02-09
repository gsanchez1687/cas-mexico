<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>CAS HKA BOLIVIA</title><meta name="description" content=""><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /><link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl ?>/imgages/favicon.ico" type="image/x-icon"><link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl ?>/images/favicon.ico" /><link rel="Bookmark" href="<?php echo Yii::app()->baseUrl ?>/images/favicon.ico" /><link rel="icon" href="<?php echo Yii::app()->baseUrl ?>/images/favicon.ico" /><script src="<?php echo Yii::app()->baseUrl ?>/plugins/shortcuts/shortcuts.js"></script><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/plugins/pace/pace.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/plugins/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/fontawesome/font-awesome.min.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/animate.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/main.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/form.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/style.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/onoffswitch/switch.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/css/messenger.css"><link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/css/messenger-theme-flat.css">  
        <script type="text/javascript">if (top.location != self.location)
                top.location = self.location;</script>
        <script type="text/javascript">
            shortcut.add("backspace", function () { });
            shortcut.add("enter", function () { });
        </script>
        <script>

            $(document).ready(function () {
                mensajes();
            });
            function mensajes() {
                var vector = $(".mensajes").val();

                if (vector != null) {
                    Messenger().post({
                        message: vector,
                        type: 'success',
                        hideAfter: 300,
                        showCloseButton: true
                    });
                }
            }


        </script>        
    </head>
    <body onstorage="">      
        <section id="main-wrapper" class="theme-dark">
            <header id="header">
                <!--logo start-->
                <div class="brand">
                    <a href="<?php echo Yii::app()->baseUrl . "/site/index"; ?>" class="logo">
                        <i class="fa fa-desktop"></i>
                        CAS <span><?php echo Yii::app()->params['Pais']; ?></span>
                    </a>
                </div>
                <!--logo end-->                
            </header>
            <!--sidebar left start-->
            <aside class="sidebar sidebar-left">
                <div class="sidebar-profile">
                    <div class="avatar">
                        <?php if (Yii::app()->user->getState('photo') != null): ?>
                            <img class="img-circle profile-image" src="<?php echo Yii::app()->baseUrl ?>/uploads/<?php echo Yii::app()->user->getState('photo'); ?>" alt="profile">
                        <?php else: ?>
                            <img class="img-circle profile-image" src="<?php echo Yii::app()->baseUrl ?>/images/avatar.jpg" alt="profile">
                        <?php endif; ?>
                        <i class="on border-dark animated bounceIn"></i>
                    </div>
                    <div class="profile-body dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><h4><?php echo Yii::app()->params['nombre']; ?> <span class="caret"></span></h4></a>
                        <h4><?php echo Yii::app()->user->getState('name') . " " . Yii::app()->user->getState('lastname'); ?></h4>                      
                        <small style="color:#FFF; font-weight: bold;" class="title"><?php echo Controller::nombrerol(); ?></small>             
                    </div>
                </div>
                <nav>
                    <h5 class="sidebar-header">Menu</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="<?php echo Yii::app()->baseUrl; ?>/site/index" title="Dashboard">
                                <i class="fa  fa-fw fa-tachometer"></i> PANEL
                            </a>
                        </li>


                        <li>
                            <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-sign-out"></i>Cerrar Sesión</a>
                        </li>
                        </li>
                    </ul>
                </nav>

            </aside>
            <!--sidebar left end-->
            <!--main content start-->
            <section class="main-content-wrapper">

                <section style="margin-top: 0px !important; z-index: 1000" id="main-content" class="animated fadeInUp">

                    <?php foreach (Yii::app()->user->getFlashes() as $key => $message) : ?>

                        <input type="hidden" class="mensajes" value="<?php echo $message; ?>">

                    <?php endforeach; ?>

                    <?php echo $content; ?>
                    <div class="clear"></div>

                </section>
            </section>
            <!--main content end-->
        </section>      
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>    
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/pace/pace.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/wizard/js/loader.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/js/src/app.js"></script>      
        <script src="<?php echo Yii::app()->baseUrl ?>/js/jquery.validate.js"></script>         
        <script src="<?php echo Yii::app()->baseUrl ?>/js/switch/switch.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/fullscreen/jquery.fullscreen-min.js"></script>  
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/navgoco/jquery.navgoco.min.js"></script>  
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/js/underscore-min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/js/backbone-min.js"></script>       
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/js/messenger.min.js"></script>              
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/js/demo/location-sel.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/js/demo/theme-sel.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/js/demo/demo.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/messenger/js/demo/demo-messages.js"></script>        
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script src="<?php echo Yii::app()->baseUrl ?>/js/jquery.ba-bbq.js"></script>
        <?php
        if (Yii::app()->params['IDGridview'] != NULL) {
            $rutaUrlGridviewBoxSwitch = Yii::app()->params['rutaUrlGridviewBoxSwitch'];
            $IDGridview = Yii::app()->params['IDGridview'];
            Yii::app()->clientScript->registerScript('LoadGridviewBoxSwitch', "GridviewBoxSwitch('{$IDGridview}','{$rutaUrlGridviewBoxSwitch}');");
            Yii::app()->clientScript->registerScript('UpdateGridviewBoxSwitch', " function UpdateGridviewBoxSwitch(id, data) { GridviewBoxSwitch('{$IDGridview}','{$rutaUrlGridviewBoxSwitch}'); }");
        }
        ?>    
    </body>
</html>
