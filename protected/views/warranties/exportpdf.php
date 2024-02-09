<style>
.demo,.demo2{border-collapse:collapse}.demo th,.demo2 th{padding:5px;background:#F0F0F0;border:1px solid silver}.demo,.demo td,.demo th,.demo2,.demo2 td,.demo2 th{border:1px solid silver}.demo{width:100%;padding:5px}.demo caption{caption-side:top;text-align:center}.demo th{font-size:11px}.demo td{padding:5px;font-size:10px}.demo2{width:150px;padding:5px}.demo2 th{font-size:11px}.demo2 td{padding:4px;font-size:10px}.logo{position:absolute;right:0;margin:-20px 0 0 60px}.chek{border:1px solid #000;padding:5px}
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


        <div class="logo"><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/".Yii::app()->params["logo"], " ", array("width" =>Yii::app()->params["width"]))  ?></div>
        <br />        
        <br />        
        <br />        
        <br />        
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
                     <td>REPRESENTANTE SERVICIO CLIENTE</td>
                    
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
                            <td>&nbsp;<?php echo $vara; ?> </td>
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
                        <td style="text-align: center;"> 
                            <span class="chek"><?php echo $open1;?></span>&nbsp;SI
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="chek"><?php echo $open0;?></span>&nbsp;NO
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />    
            
            <table class="demo table-bordered table-striped table-condensed"> 
               
                <thead>
                    <tr>
                        <th style="text-align: center;"><b>RAZÓN DE LA DEVOLUCION</b></th>                     
                    </tr>
               </thead>
                <tr>
                    <td class="text-center">
                        <span class="chek"><?php echo $falla1;?></span>&nbsp;Dead On Arrival   
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="chek"><?php echo $falla2;?></span>&nbsp;Falla del Equipo              
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="chek"><?php echo $falla3;?></span>&nbsp;Otro, Por favor Especifique
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
                        <td>  <?php echo $Failure['failure']['description_replacement']; ?>  <br></td>
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
            
           
            <table class="demo table-bordered table-striped table-condensed">
              <tr>
                <th class="tg-031e">FIRMA TÉCNICO</th>
                <th class="tg-031e">FIRMA JEFE DE CAS</th>
                <th class="tg-031e">FIRMA SOPORTE THE FACTORY</th>
              </tr>
              <tr>
                  <td><br /><br /><br /></td>
                  <td><br /><br /><br /></td>
                  <td><br /><br /><br /></td>
              </tr>
            </table>