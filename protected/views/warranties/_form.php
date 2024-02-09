<script>
         $(document).ready(function () {      
         $('.btn-next').addClass('disabled');       
         $('.data_client').hide();
         $('#content_disposicion').hide();
         $('#content_specification').hide();
         $('#specification').hide();
         $('#lista_fallas').hide();
         $("#Warranties_code").prop('disabled', true);
         $("#Warranties_name").prop('disabled', true);
         $("#Devices_bill_sale").prop('disabled', true);
         $("#Devices_distributor_id").prop('disabled', true);
         $("#Devices_brand_id").prop('disabled', true);
         $("#Devices_model_id").prop('disabled', true);
         $("#Devices_sale_date").prop('disabled', true);
         $(".Devices_name_serial").prop('disabled', true);         
         $("#Warranties_date_customer_complaint").prop('disabled', true);         
       
    });
    
    /* AJAX QUE BUSCA EL SERIAL DE LA IMPRESORA */
   function serial() {      
        $("#code").append('');
        $("#code").html('');
        $('#status').append();
        
        var serial = $('#Devices_name').val();
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/serial/',
            data: 'serial=' + serial,           
            type: 'POST',
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<img src='../images/ajax-loader.gif' />");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Al parecer tiene problemas de conexion, Intente nuevamente");
            },
            success: function (rs) {
                var respuesta = eval('(' + rs + ')');
                  
                if (respuesta.valido == 1) {                     
                    $('#serial').html('<i class="fa fa-check"></i> Se ha encontrado el serial del equipo. Puede continuar la operacion en el boton de SIGUIENTE');

                if(respuesta.statu_id == 2){
                      $('#next').addClass('disabled'); 
                      $('#mensaje_statu').html('<i class="fa fa-exclamation"></i> Este RMA aun se encuentra en proceso. Por favor seleccione el RMA para seguir el proceso');
                }else if (respuesta.statu_id == 3)  {
                       $('#next').addClass('disabled'); 
                       $('#mensaje_statu').html('<i class="fa fa-exclamation"></i> Este RMA ya esta cerrado');
                }else {
                    $('#next').removeClass('disabled'); 
                } 

                 if(respuesta.datos.status == 1){
                     $('#status').show();                    
                     $('#status').html('<i class="fa fa-check"></i> Este equipo tiene RMA previo');

                     $("#codex").val(respuesta.code);
                     $("#codexid").val(respuesta.id);
                         var data =  $("#codex").val();
                         var dataid =  $("#codexid").val();
                         var arr = data.split(',');   
                         var arrid = dataid.split(',');   

                 for(var i = 0; i < arr.length; i++){                                   
                                   $("#code").append("<a target_'blank' href=update/"+arrid[i]+">"+arr[i]+"</a><br />");	
                 }                            

                 }else { $('#status').html('<i class="fa fa-exclamation"></i> Este equipo no tiene RMA previo'); }

                     $("select#Devices_distributor_id").val(respuesta.datos.distributor_id);
                     $("#Devices_brand_id").val(respuesta.datos.brand_id);
                     $("#Devices_model_id").val(respuesta.datos.model_id);                
                     $("#model_id").val(respuesta.datos.model_id);                
                     $(".Devices_name_serial").val(serial);
                     $("#Devices_sale_date").val(respuesta.datos.sale_date);
                     $("#Devices_bill_sale").val(respuesta.datos.bill_sale); 


                         $("#qw").empty();
                         var html = "<td>Numero</td><td>Seleccionar</td><td>Descripción falla</td><td> Causa / Solución</td><td>Número  de parte del respuesto</td><td>Descripción del respuesto</td></tr>"
                         $("#qw").append(html);  
                         html = '';
                         var contador = 1;
                         for(var i = 0; i < respuesta.fallas.length; i++){
                           html += '<tr><td>'+contador+'</td>'
                           html +=  '<td><input value="'+respuesta.fallas[i].id+'" type="checkbox"  id="checkbox'+contador+'"></td>'
                           html +=  '<td><div value="'+respuesta.fallas[i].description_failure+'" id="falla'+contador+'">'+respuesta.fallas[i].description_failure+'</div></td>'
                           html +=  '<td><div value="'+respuesta.fallas[i].solution+'" id="causa'+contador+'">'+respuesta.fallas[i].solution+'</div></td>'
                           html +=  '<td><div value="'+respuesta.fallas[i].replacement+'" id="parte'+contador+'">'+respuesta.fallas[i].replacement+'</div></td>'
                           html +=  '<td><div value="'+respuesta.fallas[i].description_replacement+'" id="repuesto'+contador+'">'+respuesta.fallas[i].description_replacement+'</div></td></tr>'
                           $("#qw").append(html);  
                           html = '';   
                           contador = contador + 1;
                         }   
                         var cont =  '<input type="hidden" id="total_contador" value="'+contador+'" />';
                         $("#contador").append(cont); 
                         cont = '';

                     /**/
                    
                } else {           
                    $('#next').addClass('disabled');
                    $('#serial').html('<i class="fa fa-exclamation"></i> No se encontro el serial de la impresora porque no existe cargado al sistema. Intente nuevamente con otro serial');    
                    $('#status').hide(200);
                   
                }
            }

        });

    } 
    
    
    function savefailures(){
    
        $('#lista_fallas').show();    
        var html = '';
        var html_causa_solucion = '';
        var html_repuesto = '';
        var total_contador = '';

       	total_contador = $('#total_contador').val();
        
        $("#tabla_falla").empty();         
        html = "<tr style='background-color: #f5f5f5;'><td>Descripción falla</td></tr>";
        $("#tabla_falla").append(html);
        html='';
         
        $("#tabla_causa_solucion").empty();  
        html_causa_solucion = "<tr style='background-color: #f5f5f5;'><td>Causa / Solución</td></tr>";
        $("#tabla_causa_solucion").append(html_causa_solucion);  
        html_causa_solucion = '';
        
        $("#tabla_repuesto").empty();  
        html_repuesto = "<tr style='background-color: #f5f5f5;'><td>Repuestos</td><td>Solicitado a The Factory HKA</td></tr>";
        $("#tabla_repuesto").append(html_repuesto);  
        html_repuesto = '';
         
	for(i=1;i<=total_contador-1;i++)
	 {            
         if( $('#checkbox'+i).is(':checked') == true) {
             
                        var falla = $('#falla'+i).text();
                        var parte = $('#parte'+i).text();
                        var causa = $('#causa'+i).text();
                        var repuesto = $('#repuesto'+i).text();

                        html += "<tr><td>" + falla + "<input class='falla_select' type='hidden' value='" + $('#checkbox'+i).val() + "'></td>"                                      
                        $("#tabla_falla").append(html);
                        html = '';
                        
                        html_causa_solucion += "<tr><td>" + causa + "<input class='falla_select' type='hidden'></td>"                                      
                        $("#tabla_causa_solucion").append(html_causa_solucion);
                        html_causa_solucion = '';
                        
                      
                        html_repuesto += "<tr><td>" + parte +" - "+ repuesto +"<input class='falla_select' type='hidden' ></td>"
                        html_repuesto += "<td><input  type='checkbox' class='fabrica_hka' value='" + $('#checkbox'+i).val() + "' name='fabrica[]'  ></td></tr>";
                        $("#tabla_repuesto").append(html_repuesto);
                        html_repuesto = '';

                    }
                  
                }
    }
    
    function nit() {
        var nit = $('#Customers_nit').val();
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/nit/',
            data: 'nit=' + nit,
            type: 'POST',
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<img src='../images/ajax-loader.gif' />");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Al parecer tiene problemas de conexion, Intente nuevamente");
            },
            success: function (rs) {
                var respuesta = eval('(' + rs + ')');
                  
                if (respuesta.valido == 1) { 
                    $('.alert_warning').hide();
                    $('.alert_success').show(200);
                    $('.alert_success').html('<i class="fa fa-check"></i> Se ha encontrado el Cliente. Si desea pueden cambiar y guardar los datos del cliente');  
                    $('#edit_client').show(200);                                                    
                    $('.data_client').show(200);
                    $('#Customers_id').val(respuesta.datos.id);
                    $("#Customers_address_fiscal").val(respuesta.datos.address_fiscal);
                    $("#Customers_city_id").val(respuesta.datos.city_id);
                    $("#Customers_phone").val(respuesta.datos.phone);
                    $("#Customers_email").val(respuesta.datos.email);
                    $("#Customers_name").val(respuesta.datos.name);
                    $('#save_client').addClass('hidden');
                    

                } else {       
                    $('.alert_success').hide(200);
                    $('.alert_warning').show(200);
                    $('.alert_warning').html('<i class="fa fa-exclamation"></i> No se encontro el cliente. Debe de registrar nuevo cliente');
                    $('.data_client').show(200);                    
                    $("#Customers_address_fiscal").val('');
                    $("#Customers_name").val('');                    
                    $("#Customers_city_id").val('');
                    $("#Customers_phone").val('');
                    $("#Customers_email").val('');    
                    $('#save_client').removeClass('hidden');
                    $('#edit_client').hide(200);
                    
                }
            }

        });

    }   

    function saveclient() {             
        var nit = $('#Customers_nit').val();
        var Customers_name = $('#Customers_name').val();
        var Customers_address_fiscal = $('#Customers_address_fiscal').val();
        var Customers_city_id = $('#Customers_city_id').val();
        var Customers_phone = $('#Customers_phone').val();
        var Customers_email = $('#Customers_email').val();
       
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/saveclient/',
            data: 'nit='+nit+'&Customers_name='+Customers_name+'&Customers_address_fiscal='+Customers_address_fiscal+'&Customers_city_id='+Customers_city_id+'&Customers_phone='+Customers_phone+'&Customers_email='+Customers_email,
            type: 'POST',
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<img src='../images/ajax-loader.gif' />");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Al parecer tiene problemas de conexion, Intente nuevamente");
            },
            success: function (rs) {
                var respuesta = eval('(' + rs + ')');
                  
                if (respuesta.valido == 1) {                   
                    $('.alert_success_client').html('Se ha guardado el cliente');     
                    $('.alert_warning').hide();     
                    

                } else {           
                    $('.alert_success_client').html('NIT del cliente ya existe');
    
                }
            }

        });

    }   
    
      function editclient() {             
        var Customers_id = $('#Customers_id').val();
        var nit = $('#Customers_nit').val();
        var Customers_name = $('#Customers_name').val();
        var Customers_address_fiscal = $('#Customers_address_fiscal').val();
        var Customers_city_id = $('#Customers_city_id').val();
        var Customers_phone = $('#Customers_phone').val();
        var Customers_email = $('#Customers_email').val();
       
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/editclient/',
            data: 'nit='+nit+'&Customers_name='+Customers_name+'&Customers_address_fiscal='+Customers_address_fiscal+'&Customers_city_id='+Customers_city_id+'&Customers_phone='+Customers_phone+'&Customers_email='+Customers_email+'&Customers_id='+Customers_id,
            type: 'POST',
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<img src='../images/ajax-loader.gif' />");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Al parecer tiene problemas de conexion, Intente nuevamente");
            },
            success: function (rs) {
                var respuesta = eval('(' + rs + ')');
                  
                if (respuesta.valido == 1) {                   
                   alerts('Se ha actualizdo los datos del cliente','info');    
                    $('.alert_warning').hide();   

                } else {           
                   alerts('Error al actualizar los datos del cliente','error');   
    
                }
            }

        });

    }   
    function save_rma() {
    
        var model_id = $("#model_id").val();
        var falla_select = Array();        
        var Warranties_code = $('#Warranties_code').val();
//        var Warranties_product_open = $('#Warranties_product_open').val();
        var Devices_name = $('#Devices_name').val();       
        var Customers_nit = $('#Customers_nit').val();     
        var Warranties_date_customer_complaint = $('#Warranties_date_customer_complaint').val();      
        var Dispositions_name = $('#Dispositions_name').val();        
//        var Warranties_statu_id = $('#Warranties_statu_id').val();          
        var Warranties_observation = $('#Warranties_observation').val();
        
        $.each( $('.falla_select'), function( key, cont ) {
            falla_select[key] = cont.value;
        });
        JSONFallas = JSON.stringify(falla_select);

        var checkboxValues = new Array();        
        $('input[name="fabrica[]"]:checked').each(function() {
                checkboxValues.push($(this).val());
        });
        JSONStock = JSON.stringify(checkboxValues);        
     
        
        var Accessories_name = Array();
        $.each( $('input[name="Accessories[name][]"]:checked'), function( key, cont ) {
          Accessories_name[key] = cont.value;              
        });        
        JSONAccessorios = JSON.stringify(Accessories_name);       
        
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/saverma/',
            data: 'Devices_name='+Devices_name+'&Customers_nit='+Customers_nit+'&Warranties_date_customer_complaint='+Warranties_date_customer_complaint+'&Dispositions_name='+Dispositions_name+'&JSONAccessorios='+JSONAccessorios+'&Warranties_code='+Warranties_code+'&JSONFallas='+JSONFallas+'&model_id='+model_id+'&JSONStock='+JSONStock+'&Warranties_observation='+Warranties_observation,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<img src='../images/ajax-loader.gif' />");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Problemas al guardar la informacion, Intente nuevamente");
            },
            success: function (rs) {
                var respuesta = eval('(' + rs + ')');
                  
                if (respuesta.valido == 1) {                                         
                    var mensaje = "SE HA GUARDADO CORRECTAMENTE EL RMA";   
                    alerts(mensaje,'success'); 

                } else {                         
                     var mensaje = "NO SE PUEDO GUARDAR EL RMA. INTENTE NUEVAMENTE";     
                     alerts(mensaje,'error'); 
    
                }
            }

        });

    } 
    
     function alerts(mensaje,type) {       
            Messenger().post({               
                message: mensaje,
                type: type,
                hideAfter: 500,
                showCloseButton: true
            });
       
    }
    
//    function productopen(){
//        
//          var open = $('#Warranties_product_open option:selected').val();
//          if(open == '1'){                
//                 $('#content_disposicion').hide();      
//                 $('#content_specification').hide();      
//                 $("#avisodisposicion").html("El equipo esta fuera de garantía, si el cliente lo desea el servicio sera cotizado por el CAS");
//          }else if(open === '0'){
//                $("#avisodisposicion").html("");
//                $('#content_disposicion').show();
//               
//          }
//    }
    
//    function disposicion(){
//                           
//            var disposicion = $('#Dispositions_name option:selected').val();            
//            
//            if(disposicion === '4'){  
//                  $('#content_specification').hide();
//                  $("#avisodisposicion").html("El equipo esta fuera de garantía, si el cliente lo desea el servicio será cotizado por el CAS");
//            }
//            else if(disposicion === '5'){
//                 $('#content_specification').hide();
//                 $("#avisodisposicion").html("El mantenimiento preventivo y correctivo no estan incluidos en la garantía del equipo, si el cliente lo desea el servicio será cotizado por el CAS");                
//                 
//            }else if(disposicion === '1' || disposicion === '2' || disposicion === '3' ){     
//                
//                 $("#avisodisposicion").html('');
//                 $('#content_specification').show();
//                 
//            }else{
//                  $("#avisodisposicion").html('');
//            }
//            
//    
//    }
    
//    function reason(){
//        
//         var disposicion = $('#ReasonReturns_name option:selected').val();     
//         if(disposicion === '2'){
//             $('#basicModal').modal('show');
//             $('#specification').hide();
//         }else if (disposicion === '3'){
//               $('#specification').show();
//         }else {
//                 $('#specification').hide();
//         }
//       
//    }
    
        function alerts(mensaje,type) {       
            Messenger().post({               
                message: mensaje,
                type: type,
                hideAfter: 500,
                showCloseButton: true
            });
       
    }
    
        
    function savefailures(){
    
        $('#lista_fallas').show();    
        var html = '';
        var html_causa_solucion = '';
        var html_repuesto = '';
        var total_contador = '';

       	total_contador = $('#total_contador').val();
        
        $("#tabla_falla").empty();         
        html = "<tr style='background-color: #f5f5f5;'><td>Descripción falla</td></tr>";
        $("#tabla_falla").append(html);
        html='';
         
        $("#tabla_causa_solucion").empty();  
        html_causa_solucion = "<tr style='background-color: #f5f5f5;'><td>Causa / Solución</td></tr>";
        $("#tabla_causa_solucion").append(html_causa_solucion);  
        html_causa_solucion = '';
        
        $("#tabla_repuesto").empty();  
        html_repuesto = "<tr style='background-color: #f5f5f5;'><td>Repuestos</td><td>Solicitado a The Factory HKA</td></tr>";
        $("#tabla_repuesto").append(html_repuesto);  
        html_repuesto = '';
         
	for(i=1;i<=total_contador-1;i++)
	 {            
         if( $('#checkbox'+i).is(':checked') == true) {
             
                        var falla = $('#falla'+i).text();
                        var parte = $('#parte'+i).text();
                        var causa = $('#causa'+i).text();
                        var repuesto = $('#repuesto'+i).text();

                        html += "<tr><td>" + falla + "<input class='falla_select' type='hidden' value='" + $('#checkbox'+i).val() + "'></td>"                                      
                        $("#tabla_falla").append(html);
                        html = '';
                        
                        html_causa_solucion += "<tr><td>" + causa + "<input class='falla_select' type='hidden'></td>"                                      
                        $("#tabla_causa_solucion").append(html_causa_solucion);
                        html_causa_solucion = '';
                        
                      
                        html_repuesto += "<tr><td>" + parte +" - "+ repuesto +"<input class='falla_select' type='hidden' ></td>"
                        html_repuesto += "<td><input  type='checkbox' class='fabrica_hka' value='" + $('#checkbox'+i).val() + "' name='fabrica[]'  ></td></tr>";
                        $("#tabla_repuesto").append(html_repuesto);
                        html_repuesto = '';

                    }
                  
                }
    }
</script>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'warranties-form','enableAjaxValidation' => false,'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($modelCustomers); ?>
    <?php echo $form->errorSummary($modelDevices); ?>
    <?php echo $form->errorSummary($modelDispositions); ?>
    <?php echo $form->errorSummary($modelReasonReturns); ?>
    <?php echo $form->errorSummary($modelAccessories); ?>

    <section id="main-content" class="animated fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Codigo de reclamación de garantía<i id="resultado"></i></h3>     
                        <?php echo $form->textField($model, 'code', array('size' => 50, 'maxlength' => 50, 'value' => $codigoRMA)); ?>
                    </div>
                    <div class="panel-body">          
                        <?php if(Yii::app()->authRBAC->checkAccess('warranties_admin_cas')): ?>
                            <?php echo CHtml::link('Listado RMA', array('warranties/cas'), array('class' => 'btn btn-primary btn-3d')); ?>     
                        <?php else: ?>
                            <?php echo CHtml::link('Listado RMA', array('warranties/admin'), array('class' => 'btn btn-primary btn-3d')); ?>     
                        <?php endif; ?>                                                 
                        <div class="text-center helvetica_neueregular" id="avisofinal"></div>
                    </div>
                    <div class="panel-body">
                        <section class="fuelux">
                            <div id="MyWizard" class="wizard">
                                <ul class="steps">
                                    <li data-target="#step1" class="active"><span class="badge">1</span>Buscar Serial Equipo<span class="chevron"></span></li>
                                    <li data-target="#step2"><span class="badge">2</span>Datos del Cliente<span class="chevron"></span></li>
                                    <li data-target="#step3"><span class="badge">3</span>Datos del equipo<span class="chevron"></span></li>                                   
                                    <li  data-target="#step4"><span class="badge">4</span>Disposición<span class="chevron"></span></li>
                                    <li  data-target="#step5"><span class="badge">5</span>Reparacion<span class="chevron"></span></li>
                                </ul>
                                <div class="actions">
                                    <button type="button" class="btn btn-primary btn-mini btn-prev"> <i class="fa fa-chevron-left"></i> Anterior</button>
                                    <button type="button" id="next" class="btn btn-primary btn-mini btn-next" data-last="Terminar">Siguiente <i class="fa fa-chevron-right"></i></button>
                                </div>
                            </div>
                            <div class="step-content">
                                <!--1BUSCAR SERIAL DEL EQUIPO-->
                                <div class="step-pane active" id="step1">
                                    <form class="form-horizontal">                                       
                                         <div class="row">                                           
                                            <?php echo $form->labelEx($modelDevices,'name'); ?>
                                            <?php echo $form->textField($modelDevices,'name',array('size'=>40,'maxlength'=>40,'autocomplete'=>'off','value' => '', 'placeholder' => 'Serial del equipo','class'=>'input-alfanumerico-space')); ?>
                                            <?php echo $form->error($modelDevices,'name'); ?>
                                        </div>
                                        <input type="button" value="CONSULTAR SERIAL" class="btn btn-success btn-3d" Onclick="serial();">
                                        <div id="serial"></div>
                                        <div id="status"></div>   
                                        <div id="mensaje_statu"></div>   
                                        <input type="hidden" id="codex">
                                        <input type="hidden" id="codexid">                                   
                                        <div id="code"></div>
                                      
                                    </form>
                                </div>
                                <!--1BUSCAR SERIAL DEL EQUIPO FIN-->
                                <!--2 DATOS DEL CLIENTE-->
                                <div class="step-pane" id="step2">
                                    <form class="form-horizontal">                                       
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers,'nit'); ?>
                                                <?php echo $form->textField($modelCustomers,'nit',array('size'=>15,'maxlength'=>15,'autocomplete'=>'off','placeholder'=>'ingrese el nit del cliente','class'=>'input-integer')); ?>
                                                <?php echo $form->error($modelCustomers,'nit'); ?>
                                            </div>
                                            <input type="button" value="Consultar Cliente"  data-animated="fadeInDown" class="btn btn-success btn-3d" onclick="nit();  ">                                          
                                            <div class="alert_success"></div>
                                            <div class="alert_warning"></div>
                                            <br />
                                            
                                        <div class="data_client animated">
                                            
                                            <div class="row">                                                
                                                <?php echo $form->hiddenField($modelCustomers,'id',array('size'=>50,'maxlength'=>4,'autocomplete'=>'off','placeholder'=>'id')); ?>                                               
                                            </div>
                                           
                                            
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers,'name'); ?>
                                                <?php echo $form->textField($modelCustomers,'name',array('size'=>50,'maxlength'=>50,'autocomplete'=>'off','placeholder'=>'Nombre','class'=>'input-alfanumerico-space')); ?>
                                                <?php echo $form->error($modelCustomers,'name'); ?>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers,'email'); ?>
                                                <?php echo $form->textField($modelCustomers,'email',array('size'=>50,'maxlength'=>50,'autocomplete'=>'off','placeholder'=>'Correo electronico','class'=>'input-email')); ?>
                                                <?php echo $form->error($modelCustomers,'email'); ?>
                                            </div>
                                            

                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers,'city_id'); ?>
                                                <?php echo $form->dropDownList($modelCustomers,'city_id',CHtml::listData(Cities::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione')); ?>
                                                <?php echo $form->error($modelCustomers,'city_id'); ?>
                                            </div>
                                           

                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers,'phone'); ?>
                                               <?php echo $form->textField($modelCustomers,'phone',array('size'=>10,'maxlength'=>10,'autocomplete'=>'off','placeholder'=>'Teléfono','input-integer')); ?>
                                                <?php echo $form->error($modelCustomers,'phone'); ?>
                                            </div>

                                         
                                             <div class="row">
                                                <?php echo $form->labelEx($modelCustomers,'address_fiscal'); ?>
                                                <?php echo $form->textArea($modelCustomers,'address_fiscal',array('size'=>100,'maxlength'=>100,'rows'=>6, 'cols'=>50,'class'=>'input-alfanumerico-space-special')); ?>
                                                <?php echo $form->error($modelCustomers,'address_fiscal'); ?>
                                            </div>
                                            <input type="button" value="Guardar cambios" id="edit_client"  class="btn btn-success btn-3d" onclick="editclient();  "> <i class="alert_success_client"></i>
                                            <input type="button" value="Guardar cliente" id="save_client"  class="btn btn-success btn-3d" onclick="saveclient();  "> <i class="alert_success_client"></i>
                                        </div>
                                        
                                    </form>
                                </div>
                                <!--2 DATOS DEL CLIENTE FIN-->
                                <!--3 DATOS DEL EQUIPO-->
                                <div class="step-pane" id="step3">
                                    <form class="form-horizontal">                                        
                                        <div class="row" >
                                            <div class="col-md-6" >
                                                <div class="row">
                                                    <?php
                                                       $this->widget('ext.dropzone.EDropzone', array(
                                                        'model' => $model,
                                                        'attribute' => 'file',
                                                        'url' => $this->createUrl('warranties/upload'),
                                                        'mimeTypes' => array('image/jpeg', 'image/png'),                                                        
                                                        'options' => array('addRemoveLinks' =>true,),
                                                    ));                                                      
                                                    ?>                                                     
                                                    <?php echo CHtml::hiddenField('uploadId' , 'value', array('id' => 'hiddenInput')); ?>
                                                </div>                                                
                                            </div>
                                            <div class="col-md-6" >
                                                <div  class="row">
                                                    <?php echo $form->labelEx($modelAccessories, 'name'); ?>
                                                    <?php echo $form->checkBoxList($modelAccessories, 'name', CHtml::listData(Accessories::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty' => 'Seleccione', 'labelOptions' => array('style' => 'display: inline;'))); ?>
                                                    <?php echo $form->error($modelAccessories, 'name'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row" >
                                            <div class="col-md-6" >

                                                <div class="row">
                                                    <?php echo $form->labelEx($modelDevices, 'distributor_id'); ?>
                                                    <?php echo $form->dropDownList($modelDevices, 'distributor_id', CHtml::listData(Distributors::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty' => 'Seleccione')); ?>
                                                    <?php echo $form->error($modelDevices, 'distributor_id'); ?>
                                                </div>


                                                <div class="row">
                                                    <?php echo $form->labelEx($modelDevices, 'brand_id'); ?>
                                                    <?php echo $form->dropDownList($modelDevices, 'brand_id', CHtml::listData(Brands::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty' => 'Seleccione')); ?>
                                                    <?php echo $form->error($modelDevices, 'brand_id'); ?>
                                                </div>

                                                <div class="row">
                                                    <?php echo $form->labelEx($modelDevices, 'model_id'); ?>
                                                    <?php echo $form->dropDownList($modelDevices, 'model_id', CHtml::listData(Models::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty' => 'Seleccione')); ?>
                                                    <?php echo $form->error($modelDevices, 'model_id'); ?>
                                                </div>

                                                <div class="row">
                                                    <?php echo $form->labelEx($modelDevices, 'name'); ?>
                                                    <?php echo $form->textField($modelDevices, 'name', array('size' => 45, 'maxlength' => 45, 'class' => 'Devices_name_serial')); ?>
                                                    <?php echo $form->error($modelDevices, 'name'); ?>
                                                </div>

                                            </div>
                                            
                                            <div class="col-md-6" >
                                                
                                                <div class="row">
                                                    <?php echo $form->labelEx($modelDevices, 'sale_date'); ?>
                                                    <?php echo $form->textField($modelDevices, 'sale_date'); ?>
                                                    <?php echo $form->error($modelDevices, 'sale_date'); ?>
                                                </div>

                                                <div class="row">
                                                    <?php echo $form->labelEx($modelDevices, 'bill_sale'); ?>
                                                    <?php echo $form->textField($modelDevices, 'bill_sale', array('size' => 45, 'maxlength' => 45)); ?>
                                                    <?php echo $form->error($modelDevices, 'bill_sale'); ?>
                                                </div>
                                                
                                                
                                                <div class="row">                                                        
                                                    <?php echo $form->labelEx($model, 'date_customer_complaint'); ?>      
                                                    <?php echo $form->textField($model, 'date_customer_complaint',array('value'=>date("Y-m-d"))); ?>      
                                                    <?php echo $form->error($model, 'date_customer_complaint'); ?>                                                          
                                                </div>
                                            </div>
                                        </div>
                                        <br />                                 
                                    </form>
                                </div>
                                <!--3 DATOS DEL EQUIPO FIN-->
                                <!--4 DISPOSICION -->
                                <div class="step-pane" id="step4">
                                    
                                    <form class="form-horizontal">                                       
                                        
                                         <div class="row">
                                            <?php echo $form->labelEx($modelDispositions,'name'); ?>
                                            <?php echo $form->dropDownList($modelDispositions,'name',CHtml::listData(Dispositions::model()->findAll('active = 1',array('order' => 'id ASC')), 'id', 'name'), array('empty'=>'Seleccione la disposición')); ?>                                           
                                            <?php echo $form->error($modelDispositions,'name'); ?>
                                        </div>                                      
                                        
                                    </form>                                    
                                   
                                </div>
                               <!--4 DISPOSICION FIN -->
                               <!--5 REPARACION-->
                                <div class="step-pane" id="step5">
                                      
<!--                                         <form class="form-horizontal">                                             
                                             Falla del equipo, por favor indique
                                              <div style="overflow: scroll !important; height: 400px !important; "  class="modal-body">
                                                    <table   class="table table-bordered table-hover" id="qw">                                                
                                                    </table>
                                                    <div id="contador"></div>    
                                                </div>
                                                <div  class="modal-footer">
                                                    <input type="button" value="Agregar"  class="btn btn-primary" onclick="savefailures();">
                                                </div>                                        
                                        
                                        <div id="lista_fallas" class="panel panel-default">
                                            <div class="panel-body">
                                               <table style="width: 100%;" class="table table-bordered table-hover table-condensed table-responsive table-striped" id="tabla_falla">                                                
                                               </table>
                                                <br />
                                               <table style="width: 100%;" class="table table-bordered table-hover table-condensed table-responsive table-striped" id="tabla_causa_solucion">                                                
                                               </table>
                                                <br />
                                                <table style="width: 100%;" class="table table-bordered table-hover table-condensed table-responsive table-striped" id="tabla_repuesto">                                                
                                               </table>
                                               
                                            </div>
                                        </div>-->
                                             
                                        <div class="row">
                                            <?php echo $form->labelEx($model,'observation'); ?>
                                             <?php echo $form->textArea($model,'observation', array('rows' =>2,'cols'=>3)); ?>
                                            <?php echo $form->error($model,'observation'); ?>
                                        </div>   
                                             
                                             <input type="hidden" value="<?php echo $model->id; ?>" id="model_id" >
                                             <!--<input type="button" value="Guardar RMA"  data-animated="fadeInDown" class="btn btn-success btn-3d" onclick="save_reparacion(); ">-->
                                            <input type="button" value="Guardar RMA"  data-animated="fadeInDown" class="btn btn-success btn-3d" onclick="save_rma(); ">
                                        </form>
                                </div>
                                <!--5 REPARACION FIN-->
                            </div>                            
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Basic Modal -->
    <div style="margin-top: 200px;" class="modal fade" id="basicModal" tabindex="4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Lista de Fallas</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" id="qw">                                                
                    </table>
                    <div id="contador"></div>    
                </div>
                <div  class="modal-footer">
                    <input type="button" value="Aceptar"  class="btn btn-primary" onclick="savefailures();">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>        
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic Modal -->
    
<?php $this->endWidget(); ?>
</div><!-- form -->
