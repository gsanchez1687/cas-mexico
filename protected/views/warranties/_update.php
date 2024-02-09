<script>
    $(document).ready(function () {
        serial();
        nit();
        $("#Warranties_code").prop('disabled', true);
        $("#Warranties_name").prop('disabled', true);
        $("#Devices_bill_sale").prop('disabled', true);
        $("#Devices_distributor_id").prop('disabled', true);
        $("#Devices_brand_id").prop('disabled', true);
        $("#Devices_model_id").prop('disabled', true);
        $("#Devices_sale_date").prop('disabled', true);
        $("#Warranties_date_customer_complaint").prop('disabled', true);
        $(".Devices_name_serial").prop('disabled', true);
        $(".fotos-preview").hide();

        $("#toggle").click(function () {
            $(".fotos-preview").toggle('slow');
        });

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

                    if (respuesta.datos.status == 1) {
                        $('#status').show();
                        $('#status').html('<i class="fa fa-check"></i> Este equipo tiene RMA previo');

                        $("#codex").val(respuesta.code);
                        $("#codexid").val(respuesta.id);
                        var data = $("#codex").val();
                        var dataid = $("#codexid").val();
                        var arr = data.split(',');
                        var arrid = dataid.split(',');

                        for (var i = 0; i < arr.length; i++) {
                            $("#code").append("<a target_'blank' href=view/" + arrid[i] + ">" + arr[i] + "</a><br />");
                        }

                    } else {
                        $('#status').html('<i class="fa fa-exclamation"></i> Este equipo no tiene RMA previo');
                    }

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
                    for (var i = 0; i < respuesta.fallas.length; i++) {
                        html += '<tr><td>' + contador + '</td>'
                        html += '<td><input value="' + respuesta.fallas[i].id + '" type="checkbox"  id="checkbox' + contador + '"></td>'
                        html += '<td><div value="' + respuesta.fallas[i].description_failure + '" id="falla' + contador + '">' + respuesta.fallas[i].description_failure + '</div></td>'
                        html += '<td><div value="' + respuesta.fallas[i].solution + '" id="causa' + contador + '">' + respuesta.fallas[i].solution + '</div></td>'
                        html += '<td><div value="' + respuesta.fallas[i].replacement + '" id="parte' + contador + '">' + respuesta.fallas[i].replacement + '</div></td>'
                        html += '<td><div value="' + respuesta.fallas[i].description_replacement + '" id="repuesto' + contador + '">' + respuesta.fallas[i].description_replacement + '</div></td></tr>'
                        $("#qw").append(html);
                        html = '';
                        contador = contador + 1;
                    }
                    var cont = '<input type="hidden" id="total_contador" value="' + contador + '" />';
                    $("#contador").append(cont);
                    cont = '';
                    $('#next').removeClass('disabled');
                    /**/

                } else {
                    $('#next').addClass('disabled');
                    $('#serial').html('<i class="fa fa-exclamation"></i> No se encontro el serial de la impresora porque no existe cargado al sistema. Intente nuevamente con otro serial');
                    $('#status').hide();

                }
            }

        });

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
                    $('.alert_success').show();
                    $('.alert_success').html('<i class="fa fa-check"></i> Se ha encontrado el Cliente. Si desea pueden cambiar y guardar los datos del cliente');
                    $('#edit_client').show();
                    $('.data_client').show();
                    $('#Customers_id').val(respuesta.datos.id);
                    $("#Customers_address_fiscal").val(respuesta.datos.address_fiscal);
                    $("#Customers_city_id").val(respuesta.datos.city_id);
                    $("#Customers_phone").val(respuesta.datos.phone);
                    $("#Customers_email").val(respuesta.datos.email);
                    $("#Customers_name").val(respuesta.datos.name);
                    $('#save_client').addClass('hidden');


                } else {
                    $('.alert_success').hide();
                    $('.alert_warning').show();
                    $('.alert_warning').html('<i class="fa fa-exclamation"></i> No se encontro el cliente. Debe de registrar nuevo cliente');
                    $('.data_client').show();
                    $("#Customers_address_fiscal").val('');
                    $("#Customers_name").val('');
                    $("#Customers_city_id").val('');
                    $("#Customers_phone").val('');
                    $("#Customers_email").val('');
                    $('#save_client').removeClass('hidden');
                    $('#edit_client').hide();

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
            data: 'nit=' + nit + '&Customers_name=' + Customers_name + '&Customers_address_fiscal=' + Customers_address_fiscal + '&Customers_city_id=' + Customers_city_id + '&Customers_phone=' + Customers_phone + '&Customers_email=' + Customers_email,
            type: 'POST',
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-3x fa-fw margin-bottom'></i>");
            },
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Al parecer tiene problemas al editar la informacion del cliente");
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
            data: 'nit=' + nit + '&Customers_name=' + Customers_name + '&Customers_address_fiscal=' + Customers_address_fiscal + '&Customers_city_id=' + Customers_city_id + '&Customers_phone=' + Customers_phone + '&Customers_email=' + Customers_email + '&Customers_id=' + Customers_id,
            type: 'POST',
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-3x fa-fw margin-bottom'></i>");
            },
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Error al actualizar los datos del cliente");
            },
            success: function (rs) {
                var respuesta = eval('(' + rs + ')');

                if (respuesta.valido == 1) {
                    alerts('Se ha actualizdo los datos del cliente', 'info');
                    $('.alert_warning').hide();

                } else {
                    alerts('Error al actualizar los datos del cliente', 'error');

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

    function savefailures(){
    
        $('#lista_fallas').show();    
        var html = '';
        var html_causa_solucion = '';
        var html_repuesto = '';
        var total_contador = '';

       //	total_contador = $('#total_contador').val();
         total_contador = $(".checkbox-column input:checked").length;
        
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
         
          
	for(i=1;i<=total_contador-1;i++){            
         if( $('#selectedIds_'+i).is(':checked') == true) {
             
             alert($('#falla').text());


                    }
                  
                }
    }

    
    
    function save_reparacion(){        
        var model_id = $("#warranties_id").val();       
        var Warranties_code = $('#Warranties_code').val();
        var Devices_name = $('#Devices_name').val();       
        var Customers_nit = $('#Customers_nit').val();     
        var Warranties_date_customer_complaint = $('#Warranties_date_customer_complaint').val();      
        var Dispositions_name = $('#Dispositions_name').val(); 
        var Warranties_observation = $('#Warranties_observation').val();
        var statu_id = '1';
        var Accessories_name = Array();
        $.each( $('input[name="Accessories[name][]"]:checked'), function( key, cont ) {
          Accessories_name[key] = cont.value;              
        });        
        JSONAccessorios = JSON.stringify(Accessories_name);       
        
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/editrma/',
            data: 'Devices_name='+Devices_name+'&Customers_nit='+Customers_nit+'&Warranties_date_customer_complaint='+Warranties_date_customer_complaint+'&Dispositions_name='+Dispositions_name+'&JSONAccessorios='+JSONAccessorios+'&Warranties_code='+Warranties_code+'&model_id='+model_id+'&Warranties_observation='+Warranties_observation+'&statu_id='+statu_id,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw margin-bottom'></i>");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Problemas al guardar la informacion, Intente nuevamente");
            },
            success: function (rs) {
                $("#resultado").html("");
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
    function mejorar(){        
        var model_id = $("#warranties_id").val();       
        var Warranties_code = $('#Warranties_code').val();
        var Devices_name = $('#Devices_name').val();       
        var Customers_nit = $('#Customers_nit').val();     
        var Warranties_date_customer_complaint = $('#Warranties_date_customer_complaint').val();      
        var Dispositions_name = $('#Dispositions_name').val(); 
        var Warranties_observation = $('#Warranties_observation').val();
        var statu_id = '8';
        
        var Accessories_name = Array();
        $.each( $('input[name="Accessories[name][]"]:checked'), function( key, cont ) {
          Accessories_name[key] = cont.value;              
        });        
        JSONAccessorios = JSON.stringify(Accessories_name);       
        
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/editrma/',
            data: 'Devices_name='+Devices_name+'&Customers_nit='+Customers_nit+'&Warranties_date_customer_complaint='+Warranties_date_customer_complaint+'&Dispositions_name='+Dispositions_name+'&JSONAccessorios='+JSONAccessorios+'&Warranties_code='+Warranties_code+'&model_id='+model_id+'&Warranties_observation='+Warranties_observation+'&statu_id='+statu_id,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw margin-bottom'></i>");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Problemas al guardar la informacion, Intente nuevamente");
            },
            success: function (rs) {
                $("#resultado").html("");
                var respuesta = eval('(' + rs + ')');
              
                  
                if (respuesta.valido == 1) {                                         
                    var mensaje = "SE HA CAMBIADO EL ESTATUS A MEJORAR EL RMA";   
                    alerts(mensaje,'success'); 

                } else {                         
                     var mensaje = "NO SE PUEDO CAMBIAR EL ESTATUS. INTENTE NUEVAMENTE";     
                     alerts(mensaje,'error'); 
    
                }
            }

        });

    
    } 
    function aprobar(){        
        var model_id = $("#warranties_id").val();       
        var Warranties_code = $('#Warranties_code').val();
        var Devices_name = $('#Devices_name').val();       
        var Customers_nit = $('#Customers_nit').val();     
        var Warranties_date_customer_complaint = $('#Warranties_date_customer_complaint').val();      
        var Dispositions_name = $('#Dispositions_name').val(); 
        var Warranties_observation = $('#Warranties_observation').val();
        var statu_id = '2';
        
        var Accessories_name = Array();
        $.each( $('input[name="Accessories[name][]"]:checked'), function( key, cont ) {
          Accessories_name[key] = cont.value;              
        });        
        JSONAccessorios = JSON.stringify(Accessories_name);       
        
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/editrma/',
            data: 'Devices_name='+Devices_name+'&Customers_nit='+Customers_nit+'&Warranties_date_customer_complaint='+Warranties_date_customer_complaint+'&Dispositions_name='+Dispositions_name+'&JSONAccessorios='+JSONAccessorios+'&Warranties_code='+Warranties_code+'&model_id='+model_id+'&Warranties_observation='+Warranties_observation+'&statu_id='+statu_id,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw margin-bottom'></i>");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Problemas al guardar la informacion, Intente nuevamente");
            },
            success: function (rs) {
                $("#resultado").html("");
                var respuesta = eval('(' + rs + ')');
              
                  
                if (respuesta.valido == 1) {                                         
                    var mensaje = "SE ha APRONADO EL RMA";   
                    alerts(mensaje,'success'); 

                } else {                         
                     var mensaje = "NO SE PUEDO APROBAR EL RMA. INTENTE NUEVAMENTE";     
                     alerts(mensaje,'error'); 
    
                }
            }

        });

    
    } 
    function aprobar_soporte(){        
        var model_id = $("#warranties_id").val();       
        var Warranties_code = $('#Warranties_code').val();
        var Devices_name = $('#Devices_name').val();       
        var Customers_nit = $('#Customers_nit').val();     
        var Warranties_date_customer_complaint = $('#Warranties_date_customer_complaint').val();      
        var Dispositions_name = $('#Dispositions_name').val(); 
        var Warranties_observation = $('#Warranties_observation').val();
        var statu_id = '5';
        
        var Accessories_name = Array();
        $.each( $('input[name="Accessories[name][]"]:checked'), function( key, cont ) {
          Accessories_name[key] = cont.value;              
        });        
        JSONAccessorios = JSON.stringify(Accessories_name);       
        
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/editrma/',
            data: 'Devices_name='+Devices_name+'&Customers_nit='+Customers_nit+'&Warranties_date_customer_complaint='+Warranties_date_customer_complaint+'&Dispositions_name='+Dispositions_name+'&JSONAccessorios='+JSONAccessorios+'&Warranties_code='+Warranties_code+'&model_id='+model_id+'&Warranties_observation='+Warranties_observation+'&statu_id='+statu_id,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw margin-bottom'></i>");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Problemas al guardar la informacion, Intente nuevamente");
            },
            success: function (rs) {
                $("#resultado").html("");
                var respuesta = eval('(' + rs + ')');
              
                  
                if (respuesta.valido == 1) {                                         
                    var mensaje = "SE ha APRONADO EL RMA";   
                    alerts(mensaje,'success'); 

                } else {                         
                     var mensaje = "NO SE PUEDO APROBAR EL RMA. INTENTE NUEVAMENTE";     
                     alerts(mensaje,'error'); 
    
                }
            }

        });

    
    } 
    function noaprobar_soporte(){        
        var model_id = $("#warranties_id").val();       
        var Warranties_code = $('#Warranties_code').val();
        var Devices_name = $('#Devices_name').val();       
        var Customers_nit = $('#Customers_nit').val();     
        var Warranties_date_customer_complaint = $('#Warranties_date_customer_complaint').val();      
        var Dispositions_name = $('#Dispositions_name').val(); 
        var Warranties_observation = $('#Warranties_observation').val();
        var statu_id = '7';
        
        var Accessories_name = Array();
        $.each( $('input[name="Accessories[name][]"]:checked'), function( key, cont ) {
          Accessories_name[key] = cont.value;              
        });        
        JSONAccessorios = JSON.stringify(Accessories_name);       
        
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/editrma/',
            data: 'Devices_name='+Devices_name+'&Customers_nit='+Customers_nit+'&Warranties_date_customer_complaint='+Warranties_date_customer_complaint+'&Dispositions_name='+Dispositions_name+'&JSONAccessorios='+JSONAccessorios+'&Warranties_code='+Warranties_code+'&model_id='+model_id+'&Warranties_observation='+Warranties_observation+'&statu_id='+statu_id,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw margin-bottom'></i>");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Problemas al guardar la informacion, Intente nuevamente");
            },
            success: function (rs) {
                $("#resultado").html("");
                var respuesta = eval('(' + rs + ')');
              
                  
                if (respuesta.valido == 1) {                                         
                    var mensaje = "SE ha APRONADO EL RMA";   
                    alerts(mensaje,'success'); 

                } else {                         
                     var mensaje = "NO SE PUEDO APROBAR EL RMA. INTENTE NUEVAMENTE";     
                     alerts(mensaje,'error'); 
    
                }
            }

        });

    
    } 
    function pago(){        
        var model_id = $("#warranties_id").val();       
        var Warranties_code = $('#Warranties_code').val();
        var Devices_name = $('#Devices_name').val();       
        var Customers_nit = $('#Customers_nit').val();     
        var Warranties_date_customer_complaint = $('#Warranties_date_customer_complaint').val();      
        var Dispositions_name = $('#Dispositions_name').val(); 
        var Warranties_observation = $('#Warranties_observation').val();
        var statu_id = '9';
        
        var Accessories_name = Array();
        $.each( $('input[name="Accessories[name][]"]:checked'), function( key, cont ) {
          Accessories_name[key] = cont.value;              
        });        
        JSONAccessorios = JSON.stringify(Accessories_name);       
        
        $.ajax({
            url: 'http://<?php echo $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl; ?>/warranties/editrma/',
            data: 'Devices_name='+Devices_name+'&Customers_nit='+Customers_nit+'&Warranties_date_customer_complaint='+Warranties_date_customer_complaint+'&Dispositions_name='+Dispositions_name+'&JSONAccessorios='+JSONAccessorios+'&Warranties_code='+Warranties_code+'&model_id='+model_id+'&Warranties_observation='+Warranties_observation+'&statu_id='+statu_id,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#resultado").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw margin-bottom'></i>");
            },
                    
            complete: function () {
                $("#resultado").html("");
            },
            error: function () {
                alert("Problemas al guardar la informacion, Intente nuevamente");
            },
            success: function (rs) {
                $("#resultado").html("");
                var respuesta = eval('(' + rs + ')');
              
                  
                if (respuesta.valido == 1) {                                         
                    var mensaje = "SE ha APRONADO EL RMA";   
                    alerts(mensaje,'success'); 

                } else {                         
                     var mensaje = "NO SE PUEDO APROBAR EL RMA. INTENTE NUEVAMENTE";     
                     alerts(mensaje,'error'); 
    
                }
            }

        });

    
    } 

</script>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'warranties-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($modelCustomers); ?>
    <?php echo $form->errorSummary($modelDevices); ?>
    <?php echo $form->errorSummary($modelAccessories); ?>
    <?php echo $form->errorSummary($modelDispositions); ?>
  
    <section id="main-content" class="animated fadeInUp">
        <div class="row">       
            <div class="col-md-12">
                <div class="panel panel-default">
                    <?php //if ($model->statu_id == 1): ?>
                        <div class="panel-heading">
                            <h3 class="panel-title">Reclamación de garantía <b><?php echo $model->code;?></b><i id="resultado"></i></h3>
                            <input type="hidden" id="Warranties_code" value="<?php echo $model->code;  ?>"  >
                        </div>
                        <div class="panel-body">
                            <?php echo CHtml::link('Ver planilla', array('warranties/view/' . $model->id), array('class' => 'btn btn-primary btn-3d')); ?>
                            <?php echo CHtml::link('Listado RMA', array('warranties/admin'), array('class' => 'btn btn-primary btn-3d')); ?>  
                            <?php echo CHtml::link('Nuevo RMA', array('warranties/create'), array('class' => 'btn btn-primary btn-3d')); ?> 
                            <div class="text-center helvetica_neueregular" id="avisofinal"></div>
                        </div>
                        <div class="panel-body">
                            <section class="fuelux">
                                <div id="MyWizard" class="wizard">
                                    <ul class="steps">                                                                
                                        <!--<li data-target="#step1" class="active"><span class="badge">1</span>serial<span class="chevron"></span></li>-->                                   
                                        <li data-target="#step2" class="active"><span class="badge">2</span>Datos del cliente<span class="chevron"></span></li>                                   
                                        <li data-target="#step3"><span class="badge">3</span>Datos del equipo<span class="chevron"></span></li>                                   
                                        <li  data-target="#step4"><span class="badge">4</span>Disposición<span class="chevron"></span></li>
                                        <li  data-target="#step5"><span class="badge">5</span>Reparacion<span class="chevron"></span></li>            
                                    </ul>
                                    <div class="actions">
                                        <button type="button" class="btn btn-primary btn-mini btn-prev"> <i class="fa fa-chevron-left"></i> Anterior</button>
                                        <button type="button" id="next" class="btn btn-primary btn-mini btn-next" data-last="Terminar">Siguiente <i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <!--DATOS DEL CLIENTE-->
                                <div class="step-content">
                                    <!--Este es el input del serial, consulto la 
                                    variale del serial del equipo y la seteo por aqui,en donde 
                                    se consulta de una vez el serial                               
                                    --->
                                    <div class="step-pane" id="step1">
                                        <form class="form-horizontal">                                       
                                            <div class="row">                                           
                                                <?php echo $form->labelEx($modelDevices, 'name'); ?>
                                                <?php echo $form->textField($modelDevices, 'name', array('size' => 40, 'maxlength' => 40, 'autocomplete' => 'off', 'value' => $iddevice, 'placeholder' => 'Serial del equipo', 'class' => 'input-alfanumerico-space')); ?>
                                                <?php echo $form->error($modelDevices, 'name'); ?>
                                            </div>
                                            <input type="button" value="CONSULTAR SERIAL" class="btn btn-success btn-3d" Onclick="serial();">
                                            <div id="serial" class="helvetica_neueregular"></div>
                                            <div id="status" class="helvetica_neueregular"></div>   
                                            <input type="hidden" id="codex">
                                            <input type="hidden" id="codexid">                                   
                                            <div id="code"></div>

                                        </form>
                                    </div>
                                    <!---fin comentario--->

                                    <div class="step-pane active" id="step2">
                                        <div class="row">                                    
                                            <?php echo $form->labelEx($modelCustomers, 'nit'); ?>
                                            <?php echo $form->textField($modelCustomers, 'nit', array('size' => 15, 'maxlength' => 15, 'autocomplete' => 'off', 'value' => $Customernit, 'placeholder' => 'ingrese el nit del cliente', 'class' => 'input-integer')); ?>
                                            <?php echo $form->error($modelCustomers, 'nit'); ?>
                                        </div>
                                        <input type="button" value="Consultar Cliente"  data-animated="fadeInDown" class="btn btn-success btn-3d" onclick="nit();
                                                ">                                          
                                        <div class="alert_success"></div>
                                        <div class="alert_warning"></div>
                                        <br />
                                        <div class="data_client animated">                                      
                                            <div class="row">                                                
                                                <?php //echo $form->hiddenField($modelCustomers,'id',array('size'=>50,'maxlength'=>4,'autocomplete'=>'off','placeholder'=>'id'));  ?>                                               
                                            </div>                                            
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers, 'name'); ?>
                                                <?php echo $form->textField($modelCustomers, 'name', array('size' => 50, 'maxlength' => 50, 'autocomplete' => 'off', 'placeholder' => 'Nombre', 'class' => 'input-alfanumerico-space')); ?>
                                                <?php echo $form->error($modelCustomers, 'name'); ?>
                                            </div>
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers, 'email'); ?>
                                                <?php echo $form->textField($modelCustomers, 'email', array('size' => 50, 'maxlength' => 50, 'autocomplete' => 'off', 'placeholder' => 'Correo electronico', 'class' => 'input-email')); ?>
                                                <?php echo $form->error($modelCustomers, 'email'); ?>
                                            </div>
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers, 'city_id'); ?>
                                                <?php echo $form->dropDownList($modelCustomers, 'city_id', CHtml::listData(Cities::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('empty' => 'Seleccione')); ?>
                                                <?php echo $form->error($modelCustomers, 'city_id'); ?>
                                            </div>
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers, 'phone'); ?>
                                                <?php echo $form->textField($modelCustomers, 'phone', array('size' => 10, 'maxlength' => 10, 'autocomplete' => 'off', 'placeholder' => 'Teléfono', 'input-integer')); ?>
                                                <?php echo $form->error($modelCustomers, 'phone'); ?>
                                            </div>
                                            <div class="row">
                                                <?php echo $form->labelEx($modelCustomers, 'address_fiscal'); ?>
                                                <?php echo $form->textArea($modelCustomers, 'address_fiscal', array('size' => 100, 'maxlength' => 100, 'rows' => 6, 'cols' => 50, 'class' => 'input-alfanumerico-space-special')); ?>
                                                <?php echo $form->error($modelCustomers, 'address_fiscal'); ?>
                                            </div>
                                             <?php echo $form->hiddenField($modelCustomers, 'id'); ?>
                                            <input type="button" value="Guardar cambios" id="edit_client"  class="btn btn-success btn-3d" onclick="editclient();
                                                    "> <i class="alert_success_client"></i>
                                            <input type="button" value="Guardar cliente" id="save_client"  class="btn btn-success btn-3d" onclick="saveclient();
                                                    "> <i class="alert_success_client"></i>
                                        </div>
                                    </div>   
                                    <!--3 DATOS DEL EQUIPO-->
                                    <div class="step-pane" id="step3">
                                        <form class="form-horizontal">                                        
                                            <div class="row" >
                                                <div class="col-md-6" >
                                                    <div class="row">
                                                        <div id="toggle"><label class="registro_foto_link">Mostrar registro fotografico <i class="fa fa-hand-o-left"></i></label></div>                                                                                              
                                                        <div class="fotos-preview">
                                                        <?php foreach ($loadFilesWarranties as $loadFilesWarranty): ?>
                                                            <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/uploads/registro_fotografico/' . $loadFilesWarranty['file'], 'Registro fotografico', array('width' => '20%')), Yii::app()->baseUrl . '/uploads/registro_fotografico/' . $loadFilesWarranty['file'], array('target' => '_blank')); ?>                                                     
                                                        <?php endforeach; ?>
                                                        </div>
                                                        <?php
                                                        $this->widget('ext.dropzone.EDropzone', array(
                                                            'model' => $model,
                                                            'attribute' => 'file',
                                                            'url' => $this->createUrl('warranties/upload'),
                                                            'mimeTypes' => array('image/jpeg', 'image/png'),
                                                            'options' => array('addRemoveLinks' => true,),
                                                        ));
                                                        ?>                                                     
                                                    <?php echo CHtml::hiddenField('uploadId', 'value', array('id' => 'hiddenInput')); ?>
                                                    </div>                                                
                                                </div>
                                                <div class="col-md-6" >
                                                        <?php $modelAccessories->name = $loadAccessoriewarranties; ?>
                                                    <div  class="row">
                                                        <?php echo $form->labelEx($modelAccessories, 'name'); ?>
                                                        <?php echo $form->checkBoxList($modelAccessories, 'name', CHtml::listData(Accessories::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), array('labelOptions' => array('style' => 'display: inline;'))); ?>
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
                                                        <?php echo $form->textField($model, 'date_customer_complaint', array('value' => date("Y-m-d"))); ?>      
                                                        <?php echo $form->error($model, 'date_customer_complaint'); ?>                                                          
                                                    </div>
                                                </div>
                                            </div>
                                            <br />                                 
                                        </form>
                                    </div>
                                    <!--3 DATOS DEL EQUIPO FIN-->  
                                    <!--4 Disposicion-->
                                    <div class="step-pane" id="step4">
                                        <form class="form-horizontal">                                       
                                            <div class="row">
                                                <?php echo $form->labelEx($modelDispositions, 'name'); ?>
                                                <?php echo $form->dropDownList($modelDispositions, 'name', CHtml::listData(Dispositions::model()->findAll('active = 1', array('order' => 'id ASC')), 'id', 'name'), array('value' => $disposicion_id)); ?>                                           
                                                <?php echo $form->error($modelDispositions, 'name'); ?>
                                            </div>                                      
                                        </form>                                    
                                    </div>
                                    <!--4 Disposicion fin-->
                                    <div class="step-pane" id="step5">                                                                       
                                        <div class="row">
                                            <?php echo $form->labelEx($model, 'observation'); ?>
                                            <?php echo $form->textArea($model, 'observation', array('rows' => 2, 'cols' => 3)); ?>
                                            <?php echo $form->error($model, 'observation'); ?>
                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $model->id; ?>" id="warranties_id" >
                                
                                <?php if(Yii::app()->user->getState('rolId') == 6){  ?><!--Supervisor CAS-->
                                        <input type="button" value="Mejorar Diagnostico"  data-animated="fadeInDown" class="btn btn-success" onclick="mejorar(); ">
                                        <input type="button" value="Aprobar RMA"  data-animated="fadeInDown" class="btn btn-primary" onclick="aprobar(); ">
                                    
                                <?php }elseif(Yii::app()->user->getState('rolId') == 7){ ?><!---Soporte TFHKA--->
                                      <input type="button" value="Aprobar RMA"  data-animated="fadeInDown" class="btn btn-primary" onclick="aprobar_soporte(); ">
                                      <input type="button" value="RMA no aprobado"  data-animated="fadeInDown" class="btn btn-primary" onclick="noaprobar_soporte(); ">
                                      
                                <?php }elseif(Yii::app()->user->getState('rolId') == 4){ ?><!--tecnico cas--->
                                      <input type="button" value="Guardar RMA"  data-animated="fadeInDown" class="btn btn-success" onclick="save_reparacion(); ">
                               <?php }elseif(Yii::app()->user->getState('rolId') == 1){ ?>
                                       <input type="button" value="CERRAR RMA"  data-animated="fadeInDown" class="btn btn-success" onclick="pago(); ">
                               <?php } ?>
                            </section>
                        </div>
                    <?php // else: ?>  
<!--                        <blockquote>
                            <p><h3>Este <b><?php //echo $model->code; ?></b> ya esta cerrado</h3></p>
                            <?php //echo CHtml::link('Ver planilla', array('warranties/view/' . $model->id), array('class' => 'btn btn-primary btn-3d')); ?>
                        <?php //echo CHtml::link('Nuevo RMA', array('warranties/create'), array('class' => 'btn btn-primary btn-3d')); ?> 
                        </blockquote>      -->
                    <?php // endif; ?>    
                </div>
            </div>         

        </div>
    </section>
<?php $this->endWidget(); ?>
</div><!-- form -->
