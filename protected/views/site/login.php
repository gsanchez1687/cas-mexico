<style>
body { 
  background: url('<?php echo Yii::app()->baseUrl ?>/images/login2.png') 
/*      no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;*/
}

</style>
<script src="<?php echo Yii::app()->baseUrl ?>/js/jquery.validate.js"></script>   
<div class="login">
<section class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div id="login-wrapper">
                <header>
                    <div class="brand"> <a href="index.html" class="logo"><?php echo CHtml::image(Yii::app()->baseUrl.'/images/thefactory.png', 'Logo',array('width'=>'100px')); ?><?php echo Yii::app()->params['titulo']; ?></a></div>
                </header>
                <div  class="panel panel-default">
                    <div style="background-color: #f5f5f5; border-bottom: solid 1px #E8EBED;" class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-check"></i> INGRESE LOS DATOS DE SU USUARIO</h3>
                    </div>
                    <div class="panel-body">                  

                        <?php $form = $this->beginWidget('CActiveForm', array('id' => 'form-loginaccess', 'enableClientValidation' => true, 'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'), 'clientOptions' => array('validateOnSubmit' => true,),)); ?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php echo $form->textField($model, 'username', array('class' => 'input-email form-control input-lg ', 'autocomplete' => 'off', 'placeholder' => 'Ingrese su nombre de usuario o correo electronico')); ?>
                                <i class="fa fa-user"></i>
                                <?php echo $form->error($model, 'username'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php echo $form->passwordField($model, 'password', array('class' => 'input-email form-control input-lg', 'autocomplete' => 'off', 'value' => '', 'placeholder' => 'Contraseña')); ?>
                                <i class="fa fa-lock"></i>
                                <?php echo $form->error($model, 'password'); ?>                                    
                                <a href="<?php echo Yii::app()->createUrl('site/recoverypass'); ?>" class="help-block">¿Olvidaste tu contraseña?</a>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12">                                  
                                <?php echo CHtml::submitButton('INICIAR SESIÓN', array('class' => 'btn btn-success btn-block btn-trans')); ?>  
                            </div>
                        </div>
                        <?php $this->endWidget(); ?> 
                    </div>
                </div>

                <?php
                foreach (Yii::app()->user->getFlashes() as $key => $message) {
                    echo '<div class="alert alert-' . $key . ' alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    echo $message . '</div>';
                }
                ?>

            </div>
        </div>
    </div>
</section>
</div>