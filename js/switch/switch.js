function GridviewBoxSwitch(e,s){function i(e,s){Messenger().post({message:e,type:s,hideAfter:300,showCloseButton:!0})}$(".onoffswitch-checkbox").click(function(){var t=$(this).attr("id");if($("#"+t).is(":checked"))var c=1;else var c=0;var r=s+"?it="+t+"&s="+c;jQuery.ajax({type:"POST",url:r,cache:!1,data:jQuery(this).parents("form").serialize(),dataType:"json",success:function(s){if(1==s.request){var t="SE HA ENVIADO EL CORREO NOTIFICANDO QUE SE LE HA APROBADO LA PIEZA";i(t,"success")}else{var t="ERROR AL ENVIAR EL CORREO. INTENTE NUEVAMENTE";i(t,"success")}jQuery("#"+e).yiiGridView("update")}})})}