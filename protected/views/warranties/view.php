<style>
    .demo,.demo2{border-collapse:collapse}.demo th,.demo2 th{padding:5px;background:#F0F0F0;border:1px solid silver}.demo,.demo td,.demo th,.demo2,.demo2 td,.demo2 th{border:1px solid silver}.demo{width:100%;padding:5px}.demo caption{caption-side:top;text-align:center}.demo th{font-size:15px}.demo td{padding:5px;font-size:12px}.demo2{width:200px;padding:5px}.demo2 th{font-size:15px}.demo2 td{padding:4px;font-size:12px}.logo2{position:absolute;right:25px;margin:0 0 0 60px}
</style>
<?php
$vara = ' ';
$varb = ' ';
$varc = ' ';
$vard = ' ';
$vare = ' ';
switch ($model->disposition_id):
    case 1: $vara = "X"; 
            break;
    case 2: $varb = "X"; 
            break;
    case 3: $varc = "X"; 
            break;
    case 4: $vard = "X"; 
            break;
    case 5: $vare = "X"; 
            break;    
endswitch;
$open0 = '';
$open1 = '';
switch ($model->product_open):
    case 0: $open0 = "X"; break;
    case 1: $open1 = "X"; break;    
endswitch;

$falla1 = '';
$falla2 = '';
$falla3 = '';
switch ($model->reason_return_id):
    case 1: $falla1 = "X"; break;
    case 2: $falla2 = "X"; break;    
    case 3: $falla3 = "X"; break;     
endswitch;
?>

<div style="width: 1100px; margin-left: auto; margin-right: auto;" class="panel panel-default">  
    <div class="panel-body">
        <div class="row">
            
        
        <div class="col-md-6">
             <table class="demo2">               
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>PÁGINA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $model->date_customer_complaint ?></td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
        <table class="demo2">
            <thead>
                <tr>
                    <th style="text-align: center" >Código del RMA</th>                
                </tr>
            </thead>
            <tr>
                <td  style="text-align: center"><b><?php echo $model->code ?></b></td>
            </tr>
        </table>
        </div>
        <div class="col-md-6">
            <div class="logo2"><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/".Yii::app()->params["logo"], " ", array("width" =>Yii::app()->params["width"]))  ?></div>
        </div>
        </div>
        
        <div class="text-center">RMA / RECLAMACIÓN DE GARANTÍA</div>
        
        <table class="demo table-bordered table-striped table-condensed">            
             <thead>
             <tr>
                     <th>DATOS DEL CLIENTE<br></th>
                     <th><br></th>
                     <th>INFORMACIÓN DEL CAS</th>
                     <th><br></th>
             </tr>
             </thead>
             <tbody>
             <tr>
                     <td>NOMBRE<br></td>
                     <td><?php echo $model->customer->name; ?></td>
                     <td>&nbsp;NOMBRE</td>
                     <td><?php echo $model->cas->representative; ?><br></td>
             </tr>
             <tr>
                     <td>ID / NIT<br></td>
                     <td><?php echo $model->customer->nit;?><br></td>
                     <td>FECHA RECLAMO CLIENTE</td>
                     <td><?php echo $model->date_customer_complaint; ?><br></td>
             </tr>
             <tr>
                     <td>DIRECCIÓN FISCAL</td>
                     <td><?php echo $model->customer->address_fiscal; ?></td>
                     <td>FECHA RECLAMO CAS</td>
                     <td><?php echo $model->claim_date_cas; ?><br></td>
             </tr>
             <tr>
                     <td>CIUDAD/ ESTADO</td>
                     <td><?php echo $model->customer->city->name; ?></td>
                     <td>HORAS DE SERVICIO</td>
                     <td><?php echo $model->hour_service." Horas"; ?><br></td>
             </tr>
             <tr>
                     <td>PAÍS</td>
                     <td><?php echo $model->customer->country->name; ?><br></td>
                     <td>REPRESENTANTE SERVICIO TÉCNICO</td>
                     <td><?php echo $model->technical_id; ?><br></td>
             </tr>
             <tr>
                     <td>TELÉFONOS </td>
                     <td><?php echo $model->customer->phone; ?></td>
                     <td>REPRESENTANTE SERVICIO AL CLIENTE</td>
                    
                     <td><?php echo $model->cas->representative; ?><br></td>
             </tr>
             <tr>
                     <td>EMAIL</td>
                     <td><?php echo $model->customer->email; ?></td>
                     <td>&nbsp;</td>
                     <td>&nbsp;<br></td>
             </tr>
             <tbody>
     </table>
       
      <br />
            <table class="demo table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                            <th>DATOS DEL EQUIPO<br></th>
                            <th><br></th>
                            <th>DISPOSICIÓN</th>
                            <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <td>MARCA / MODELO<br></td>
                            <td><?php echo $model->device->name; ?><br></td>
                            <td>Reemplazo por garantías</td>
                            <td>&nbsp; <?php echo $vara; ?> </td>
                    </tr>
                    <tr>
                            <td>SERIAL</td>
                            <td><?php echo $model->device->sale_date; ?></td>
                            <td>Reparación por garantía</td>
                            <td>&nbsp;<?php echo $varb; ?></td>
                    </tr>
                    <tr>
                            <td>FECHA DE COMPRA<br></td>
                            <td><?php echo $model->device->bill_sale; ?></td>
                            <td>Verificación de Garantía por fabricante</td>
                            <td>&nbsp;<?php echo $varc; ?></td>
                    </tr>
                    <tr>
                            <td>VENDIDO POR<br></td>
                            <td><?php echo $model->device->distributor->name; ?></td>
                            <td>Servicio por mantenimiento</td>
                            <td>&nbsp;<?php echo $vard; ?></td>
                    </tr>
                    <tbody>
            </table>
            <br />            
            <table class="demo">
                <thead>
                    <tr>
                        <th  style="text-align: center;">EL PRODUCTO ESTÁ ABIERTO<br></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  style="text-align: center;"> 
                            <span style="padding-right: 70px"><?php echo $open1;?>&nbsp;SI</span>
                            <span><?php echo $open0;?>&nbsp;NO</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />    
            
            <table class="demo table-bordered table-striped table-condensed"> 
               
                <thead>
                    <tr>
                        <th style="text-align: center;"><b>RAZÓN DE LA DEVOLUCIÓN</b></th>                     
                    </tr>
               </thead>
                <tr>
                    <td class="text-center">
                        <span style="padding-right: 80px;"><?php echo $falla1;?>&nbsp;Dead On Arrival</span>                       
                        <span style="padding-right: 80px;"><?php echo $falla2;?>&nbsp;Falla del Equipo</span>                     
                        <span style="padding-right: 80px;"><?php echo $falla3;?>&nbsp;Otro, Por favor Especifique</span>
                    </td>                   
                </tr>            
            </table>
            <br />
   
             <table class="demo table-bordered table-striped table-condensed">                
                <thead>
                    <tr>
                        <th>DESCRIPCIÓN DE LA FALLA<br></th>
                        <th><br></th>
                    </tr>
                </thead>
                 <?php foreach ($FailuresWarranties as $Failure): ?>
                <tbody>
                    
                    <tr>
                        <td>  <?php echo $Failure['failure']['description_failure']; ?>   </td>
                        <td>  <?php echo $Failure['failure']['solution']; ?>  <br></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
            <br />            
            <table class="demo table-bordered table-striped table-condensed">                
                <thead>
                    <tr>
                        <th>LISTA DE PARTES Y PIEZAS A REEMPLAZAR<br></th>
                        <th><br></th>
                    </tr>
                </thead>
                 <?php foreach ($FailuresWarranties as $Failure): ?>
                <tbody>
                    
                    <tr>
                        <td> <?php echo $Failure['failure']['replacement']; ?> </td>
                        <td> <?php echo $Failure['failure']['description_replacement']; ?>  <br></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
            <br />
            <table class="demo">                
                <thead>
                <tr>
                        <th>Comentario CAS<br></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                        <td><?php echo $model->observation; ?></td>
                </tr>
                </tbody>
        </table>
        <br />
        <table class="demo">                
                <thead>
                <tr>
                        <th>Comentario THE FACTORYHKA<br></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                        <td><?php echo $model->observation; ?></td>
                </tr>
                </tbody>
        </table>
          
        
        
        <br />
        <?php echo CHtml::link('Listado RMA', array('warranties/admin'), array('class' => 'btn btn-primary btn-3d')); ?>
        <?php echo CHtml::link('Editar', array('warranties/update/'.$model->id), array('class' => 'btn btn-primary btn-3d')); ?>
        <?php echo CHtml::link('Descargar planilla', array('warranties/exportpdf/'.$model->id), array('class' => 'btn btn-primary btn-3d','target'=>'_blank')); ?>        
        <!--si no esta cerrado no ver para nadie--->
 
        <?php //if(isset($registro_fotografico)): ?>
            <?php //echo CHtml::link('Ver registro fotográfico', array('/uploads/registro_fotografico/'.$registro_fotografico), array('class' => 'btn btn-primary btn-3d','data-toggle'=>'Modal','data-target'=>'#basicModal','target'=>'_blank')); ?>
        <?php //endif; ?>
        <button type="button" class="btn btn-primary btn-3d" data-toggle="modal" data-target="#myModal">Registro fotografico</button>
        <?php if(isset($file_polls)): ?>
              <?php echo CHtml::link('Ver encuesta firmada', array('/uploads/encuestas/'.$file_polls), array('class' => 'btn btn-primary btn-3d','target'=>'_blank')); ?> 
        <?php endif; ?>
        <?php if(isset($file_warrentiers)): ?>
            <?php echo CHtml::link('Ver RMA firmado', array('/uploads/RMA/'.$file_warrentiers), array('class' => 'btn btn-primary btn-3d','target'=>'_blank')); ?> 
        <?php endif; ?>
      
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
      <div style="margin-top: 450px" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro Fotografioco <b><?php echo $model->code; ?></b></h4>
      </div>
      <div class="modal-body">
         <?php foreach ($registro_fotografico as $registro): ?>
            <?php  echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/uploads/registro_fotografico/'.$registro['file'], 'Registro fotografico',array('width'=>'40%')),Yii::app()->baseUrl.'/uploads/registro_fotografico/'.$registro['file'],array('target'=>'_blank')); ?>                                                     
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>
