<style>
    .demo {
        width:100%;
        border:1px solid #C0C0C0;
        border-collapse:collapse;
        padding:4px;
    }
    .demo caption {
        caption-side:top;
        text-align:center;
    }
    .demo th {
        border:1px solid #C0C0C0;
        padding:4px;
        background:#F0F0F0;
        font-size: 10px;
    }
    .demo td {
        border:1px solid #C0C0C0;
        padding:4px;
        font-size: 10px;
    }
    .demo2 {
        width:150px;
        border:1px solid #C0C0C0;
        border-collapse:collapse;
        padding:5px;
    }
    .demo2 th {
        border:1px solid #C0C0C0;
        padding:5px;
        background:#F0F0F0;
        font-size: 11px;
    }
    .demo2 td {
        border:1px solid #C0C0C0;
        padding:4px;
        font-size: 10px;
    }
    .logo {
        position: absolute;
        right: 0px;       
        margin: -20px 0px 0px 60px;
    }   
    .marca{ border: 1px solid #000; }
    table {width: 100%;}    
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
    .tg td{font-family:Arial, sans-serif;font-size:10px;padding:0.8px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
    .tg th{font-family:Arial, sans-serif;font-size:10px;font-weight:normal;padding:6px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
    .tg .tg-s6z2{text-align:center}
    .tg .tg-yw4l{vertical-align:top}
</style>



        <div class="logo"><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/".Yii::app()->params["logo"], " ", array("width" =>Yii::app()->params["width"]))  ?></div>
        <br />        
        <br />        
        <br />        
        <br />        
        <div class="text-center">ENCUESTA DE SASTIFACCIÓN DEL CLIENTE</div>    
      
        <table class="tg">
            <tr>
              <th class="tg-s6z2">¿ El representante de servicio técnico fue cordial ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente de acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;De acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Neutro</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;En desacuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente en desacuerdo<br></td>
            </tr>
        </table>
        <table class="tg">
            <tr>
              <th class="tg-s6z2">¿ El representante de servicio técnico demostró tener conocimiento sobre el producto ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente de acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;De acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Neutro</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;En desacuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente en desacuerdo<br></td>
            </tr>
        </table>
        <table class="tg">
            <tr>
              <th class="tg-s6z2">¿ El representante de servicio técnico escucho con atencion su explicación del producto con el equipo ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente de acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;De acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Neutro</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;En desacuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente en desacuerdo<br></td>
            </tr>
        </table>
        <table class="tg">
            <tr>
              <th class="tg-s6z2">¿ Aproximadamente cuánto tíempo tuvo que esperar para que resolvieran su problema ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Menos de 12 horas<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Entre 12 y 24 horas<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Entre 24 y 48 horas</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Entre 48 y 72 horas<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Mas de 72 horas<br></td>
            </tr>
        </table>
        <table class="tg">
            <tr>
              <th class="tg-s6z2">¿ Aproximadamente cuánto tíempo tuvo que esperar para que fuera tendido por el personal del centro autorizado de servicio  ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Me atendieron de inmediato<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Menos de 10 minutos<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Entre 30 minitos y 1 hora</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Entre 2 y 4 hora<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Mas de 4 horas<br></td>
            </tr>
        </table>
        <table class="tg">
            <tr>
              <th class="tg-s6z2">¿ Como se comunico con servicio técnico ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;En persona<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Por teléfono<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Por correo</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Char por internet<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Otro<br></td>
            </tr>
        </table>
        <table class="tg">
            <tr>
              <th class="tg-s6z2">En general ¿ Cómo se calificaría el proceso para la resolución de su problema  ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Muy bueno<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Bueno<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Promedio</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Pobre<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Muy pobre<br></td>
            </tr>
        </table>
        <table class="tg">
            <tr>
              <th class="tg-s6z2">¿ Se encuentra sastifecho por el estado en que recibió el equipo ?<br></th>
            </tr>
            <tr>
                <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente de acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;De acuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Neutro</td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;En desacuerdo<br></td>
            </tr>
            <tr>
              <td class="tg-yw4l"><span class="marca">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Totalmente en desacuerdo<br></td>
            </tr>
        </table>
        <table class="tg">
             <tr>
              <th class="tg-s6z2">FIRMA DEL CLIENTE<br></th>
            </tr>
            <tr>
              <td class="tg-yw4l"><br><br><br></td>
            </tr>
        </table>
            