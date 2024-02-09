<div class="form">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cerrar estado del <strong><?php echo $model->code; ?></strong> </h3>                   
                </div>
                <div class="panel-body">
                    <!--wizard-->                  
                        <?php echo CHtml::link('Ver planilla', array('warranties/view/'.$model->id), array('class' => 'btn btn-primary btn-3d')); ?>
                        <?php echo CHtml::link('Listado RMA', array('warranties/cas'), array('class' => 'btn btn-primary btn-3d')); ?>  
                        <?php echo CHtml::link('Nuevo RMA', array('warranties/create'), array('class' => 'btn btn-primary btn-3d')); ?> 
                    <br /><br />
                    <section class="fuelux">
                        <div class="wizard" id="MyWizard">
                            <ul class="steps">
                                <li class="active" data-target="#step1"><span class="badge badge-info">1</span>Descargar encuesta<span class="chevron"></span></li>
                                 <li data-target="#step2" class=""><span class="badge">2</span>Subir encuesta<span class="chevron"></span></li> 
                                 <li data-target="#step3" class=""><span class="badge">3</span>Descargar  RMA<span class="chevron"></span></li> 
                                 <li data-target="#step4" class=""><span class="badge">4</span>Subir RMA firmado<span class="chevron"></span></li> 
                                 <?php if($cerrado == 1 AND $cerrado2 == 1): ?>
                                     <li data-target="#step5" class=""><span class="badge">5</span>Cerrar RMA firmado<span class="chevron"></span></li> 
                                 <?php endif;  ?>
                                                              
                            </ul>
                            <div class="actions">
                                <button class="btn btn-default btn-mini btn-prev" type="button" disabled="disabled"> <i class="fa fa-chevron-left"></i>Anterior</button>
                                <button data-last="Final" class="btn btn-primary btn-mini btn-next" type="button">Siguiente<i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="step-content">
                            <div id="step1" class="step-pane active">
                                <form class="form-horizontal">
                                    <?php echo CHtml::link('Descargar encuesta', array('/warranties/polls/' . $model->id), array('class' => 'btn btn-primary btn-3d','target'=>'_blank')); ?> 
                                </form>
                            </div>
                            <div id="step2" class="step-pane">
                                <div class="form-horizontal">         
                                   <?php if($cerrado == 0): ?>
                                    
                                        <?php $formFilesPolls = $this->beginWidget('CActiveForm', array('id' => 'files-polls-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
                                        <?php echo $formFilesPolls->errorSummary($modelFilesPolls); ?>
                                                <div>
                                                    <?php echo $formFilesPolls->labelEx($modelFilesPolls, 'name'); ?>
                                                    <?php echo $formFilesPolls->textField($modelFilesPolls, 'name', array('size' => 50, 'maxlength' => 50,'value'=>$model->code.'-ENCUESTA')); ?>
                                                    <?php echo $formFilesPolls->error($modelFilesPolls, 'name'); ?>
                                                </div>

                                                <div>
                                                    <?php echo $formFilesPolls->labelEx($modelFilesPolls, 'file'); ?>
                                                    <?php echo $formFilesPolls->FileField($modelFilesPolls, 'file', array('size' => 45, 'maxlength' => 45)); ?>
                                                    <?php echo $formFilesPolls->error($modelFilesPolls, 'file'); ?>
                                                </div>

                                                <div class="btn-group">                            
                                                    <?php echo CHtml::submitButton($modelFilesPolls->isNewRecord ? 'Subir encuesta' : Yii::app()->params['actualizar-text'], array('class' => Yii::app()->params['save-btn'])); ?>
                                                </div>

                                                <output id="list"></output>    

                                        <?php $this->endWidget(); ?>
                                <?php else: ?> 
                               
                                    <h4>La encuesta ya ha sido guardada</h4>
                                          
                                <?php endif; ?> 
                                          
                                </div>
                            </div>
                            <div id="step3" class="step-pane">
                                <form class="form-horizontal">
                                    <?php echo CHtml::link('Descargar RMA', array('/warranties/exportpdf/' . $model->id), array('class' => 'btn btn-primary btn-3d','target'=>'_blank')); ?> 
                                </form>
                            </div>
                             <div id="step4" class="step-pane">
                                <div class="form-horizontal">
                                    <?php if($cerrado2 == 0): ?>
                                        <?php $formFilesWarranties = $this->beginWidget('CActiveForm', array('id' => 'files-warranties-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
                                        <?php echo $formFilesWarranties->errorSummary($modelFilesWarranties); ?>

                                                   <div>
                                                       <?php echo $formFilesWarranties->labelEx($modelFilesWarranties, 'name'); ?>
                                                       <?php echo $formFilesWarranties->textField($modelFilesWarranties, 'name', array('size' => 50, 'maxlength' => 50,'value'=>$model->code.'-RMA')); ?>
                                                       <?php echo $formFilesWarranties->error($modelFilesWarranties, 'name'); ?>
                                                   </div>

                                                   <div>
                                                       <?php echo $formFilesWarranties->labelEx($modelFilesWarranties, 'file'); ?>
                                                       <?php echo $formFilesWarranties->FileField($modelFilesWarranties, 'file', array('size' => 45, 'maxlength' => 45)); ?>
                                                       <?php echo $formFilesWarranties->error($modelFilesWarranties, 'file'); ?>
                                                   </div>

                                           <div class="btn-group">                            
                                               <?php echo CHtml::submitButton($modelFilesWarranties->isNewRecord ? 'Guardar' : Yii::app()->params['actualizar-text'], array('class' => Yii::app()->params['save-btn'])); ?>
                                           </div>

                                       <?php $this->endWidget(); ?>
                                      <?php else: ?>                                
                                            <h4>Ya ha sido guardado el RMA firmado</h4> 
                                      <?php endif; ?>
                                </div>
                            </div>
                             <?php if($cerrado == 1 AND $cerrado2 == 1): ?>
                             <div id="step5" class="step-pane">
                                <div class="form-horizontal">
                                      <?php $form = $this->beginWidget('CActiveForm', array('id' => 'warranties-form', 'enableAjaxValidation' => false)); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                                
                                              
                                           
                                            <div class="row">
                                                <?php echo $form->labelEx($model, 'statu_id'); ?>
                                                <?php echo $form->dropDownList($model, 'statu_id', CHtml::listData(Status::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty' => 'Seleccione')); ?>
                                                <?php echo $form->error($model, 'statu_id'); ?>
                                            </div>
                                            <br /><br />
                                            <div class="btn-group">                            
                                                <?php echo CHtml::submitButton($modelFilesPolls->isNewRecord ? 'Guardar' : Yii::app()->params['actualizar-text'], array('class' => Yii::app()->params['save-btn'])); ?>
                                            </div>
                                     
                                            
                                            <?php $this->endWidget(); ?>  
                                </dic>
                            </div>
                           
                        </div>
                         <?php endif; ?>
                    </section>
                    <!--wizard-->
                </div>
            </div>
        </div>
    </div>    
</div>
<script>
function archivo(e){for(var t,n=e.target.files,a=0;t=n[a];a++)if(t.type.match("image.*")){var i=new FileReader;i.onload=function(e){return function(t){document.getElementById("list").innerHTML=['<img class="img-rounded" src="',t.target.result,'" title="',escape(e.name),'"/>'].join("")}}(t),i.readAsDataURL(t)}}document.getElementById("FilesPolls_file").addEventListener("change",archivo,!1);
</script>