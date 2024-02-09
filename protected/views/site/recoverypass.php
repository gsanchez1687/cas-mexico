<script src="<?php echo Yii::app()->baseUrl ?>/js/jquery.validate.js"></script>   
<div class="login">
<section class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div id="login-wrapper">
                <header>
                    <div class="brand"> <a href="index.html" class="logo"><?php echo CHtml::image(Yii::app()->baseUrl.'/images/thefactory.png', 'Logo',array('width'=>'100px')); ?> CAS HKA Bolivia </a></div>
                </header>
                <div class="panel panel-default">
                     <div style="background-color: #f5f5f5; border-bottom: solid 1px #E8EBED;" class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-check"></i> INGRESE SU CORREO</h3>                       
                    </div>
                     
                    <div class="panel-body">  
                        <p>
                            Por favor introduce tu e-mail para restablecer tu contraseña.
                            Recibiras un e-mail con tus datos. Si estás experimentando problemas para recuperar tu contraseña o e-mail contacte con soporte tecnico.
                        </p>

                        <?php $form = $this->beginWidget('CActiveForm', array('id' => 'form-loginaccess', 'enableClientValidation' => true, 'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form',), 'clientOptions' => array('validateOnSubmit' => true,),)); ?>
                        <?php echo $form->errorSummary($model); ?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php echo $form->textField($model, 'email', array('size'=>'50','maxlength'=>'50','class' => 'input-email form-control input-lg', 'autocomplete' => 'off', 'placeholder' => 'Correo')); ?>
                                    <i class="fa fa-user"></i>
                                <?php echo $form->error($model, 'email'); ?>
                            </div>
                        </div>

                        <div>                                                     
                                <?php echo CHtml::submitButton('Recuperar', array('class' => 'btn btn-success btn-trans btn-block')); ?>                                                             
                                <a href="<?php echo Yii::app()->createUrl('site/login'); ?>" class="btn btn-success btn-trans btn-block">Volver</a>
                        </div>
                        <?php $this->endWidget(); ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>