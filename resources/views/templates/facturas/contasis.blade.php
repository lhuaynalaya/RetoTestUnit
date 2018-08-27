<!--The below style_start tag has to be present as it is used to substring the style content from the body html-->

<!--style_start-->
<style type="text/css" media="all">
  @font-face {
    font-family: 'Open Sans', sans-serif;
    src: url(https://fonts.googleapis.com/css?family=Open+Sans);
  }
  
  .pcs-template {
    font-family: 'Open Sans', sans-serif;
    font-size: 9pt;
    color: #333333;
    background: #ffffff;
  }

  .pcs-template-header {
    padding: 0 0.400000in 0 0.550000in;
    height: 0.700000in;
  }

  .pcs-header-content {
    font-size: 9pt;
    color: #333333;
    background-color: #ffffff;
  }
  
  .pcs-template-body {
    padding: 0 0.400000in 0 0.550000in;
  }
  
  .pcs-template-footer {
    height: 0.700000in;
    font-size: 6pt;
    color: #aaaaaa;
    padding: 0 0.400000in 0 0.550000in;
    background-color: #ffffff;
  }
  
  .pcs-footer-content {
    word-wrap: break-word;
    color: #aaaaaa;
    border-top: 1px solid #adadad;
  }
  .pcs-header-logo {
    font-size: 35pt;
  }
  .color-logo-azul {
    color: #2b6ce4;
    font-weight: bold;
  }
  .color-logo-verde {
    color: #27cc34;
    font-weight: bold;
  }
  .pcs-header-logo-mensaje {
    color: #6161ff
  }
  .pcs-body-fecha {
    font-weight: bold;
    float: right;
  }
  .pcs-body-informacion {
    font-weight: bold;
     margin: 20px;
  }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  table, td, th {
    border: 1px solid black;
  }
  th {
    background-color: #2b6ce4;
    font-weight: bold;
    color: #ffffff;
    text-align: center;
  }
</style>


<div  class="pcs-template">
 <div id="header" class="pcs-template-header pcs-header-content">
    <span class="pcs-header-logo color-logo-azul">CONTA</span><span class="pcs-header-logo color-logo-verde">SIS</span>
    <br>
    <span class="pcs-header-logo-mensaje">Innovaciones Tecnologicas Corporativas</span>
  </div>
  <div class="pcs-template-body">
    <br>
    <div>
      <span class="pcs-body-fecha">LIMA, {{ $fecha }}</span>
    </div>
    <br>
    <div class="pcs-body-informacion">
      <span>Cliente: {{ $nombre_cliente }}</span>
      <br>
      <span>Atención :</span>
      <br>
      <span>Código: EVP-12-{{ $numero_factura }}</span>
    </div>
    <div>
      <table>
        <thead>
          <tr>
            <th style="width: 70%; padding-top: 3px; padding-bottom: 3px">Ítem</th>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">Precio Unitario de Venta U$$</th>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">Precio Total de Venta U$$</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding: 5px">EL SISTEMA INTEGRADO DE GESTION EMPRESARIAL E INFORMACIÓN FINANCIRA CONTASIS.
              <br>
              <span style="font-weight: bold">Contiene:</span>
              <br>
              Licencia de uso difinitivo de Sotfware Contasis para usuarios en red:
            </td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;">15,000.00</td>
          </tr>
      @if(isset($items))
        @foreach($items as $key => $item)
          <tr>
            <td style="padding: 5px">INPLEMENTACION FULL IN HAUSE AVANZADA - CONTABLE FINANCIRO
            </td>
            <td style="text-align: right;">{{ isset($item['precio']) ? $item['precio']: '' }}</td>
            <td style="text-align: right;"></td>
          </tr>
        @endforeach
      @endif
        </tbody>
      </table>
    </div>
  </div>
  <div class="pcs-template-body">
    <br>
    <div>
      <span class="pcs-body-fecha">LIMA, 05 DE DECIEMBRE DEL 2018</span>
    </div>
    <br>
    <div class="pcs-body-informacion">
      <span>Cliente: CAMATA PERUANA DE LA CONTRUCCIÓN</span>
      <br>
      <span>Atencion :</span>
      <br>
      <span>Código: EVP-12-0000914</span>
    </div>
    <div>
      <table>
        <thead>
          <tr>
            <th style="width: 70%; padding-top: 3px; padding-bottom: 3px">Ítem</th>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">Precio Unitario de Venta U$$</th>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">Precio Total de Venta U$$</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding: 5px">EL SISTEMA INTEGRADO DE GESTION EMPRESARIAL E INFORMACIÓN FINANCIRA CONTASIS.
              <br>
              <span style="font-weight: bold">Contiene:</span>
              <br>
              Licencia de uso difinitivo de Sotfware Contasis para usuarios en red:
            </td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;">15,000.00</td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">Sub Total de Venta $</td>
            <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">15,000.00</td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">IGV 18 % $</td>
            <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">15,000.00</td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">Precio de Venta Total $</td>
            <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">15,000.00</td>
          </tr>
        </tbody>
      </table>
      <table style="padding-top: -2px">
        <tbody>
          <tr>
            <td>
              <span style="font-weight: bold;padding-left: 6px;text-decoration-line: underline;">Condicines y Forma de Pago</span>
              <br>
              <span style="padding-left: 6px;">Al contado Dscto </span> <span style="padding-left: 50px;">5 %</span>
              <br>
              <span style="padding-left: 6px;" >$</span><span style="padding-left: 40px;">16,815.00</span><span style="padding-left: 30px;">Incluido IGV</span>
            </td> 
            <td>
              <span style="font-weight: bold;padding-left: 6px;text-decoration-line: underline;">Financiamiento</span>
              <br>
              <span style="padding-left: 6px;">Inicial al</span> <span style="padding-left: 30px;">50 %</span> <span  style="padding-left: 50px;">$</span> <span style="padding-left: 20px;">8.850.00</span><span style="padding-left: 30px;">Inc. IGV</span>
              <br>
              <span style="padding-left: 6px;">01</span><span style="padding-left: 50px;">Cuotas de </span><span style="padding-left: 32px;">$</span><span style="padding-left: 22px;">8.850.00</span><span style="padding-left: 30px;">Inc. IGV</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>  
    <div style="margin-left: 40px;">
      <span>Vigencia de la proforma: 7 dias</span>
      <br>
      <span>Tipo de cambio: 3.24</span>
      <br>
      <span>Precio sijeeto a cambio si previo aviso</span>
    </div>
    <br>
    <div style="margin-left: 20px; margin-right: 20px;">
      <table>
        <thead>
        <tr>
          <th colspan="4">CUENTAS CORRIENTES CONTASISCORP SAC - RUC: 20603343612</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td style="width: 20%; text-align: center; background-color: #2b6ce4; color: #fff; font-weight: bold;">BANCO</td>
          <td style="width: 20%; text-align: center; background-color: #2b6ce4; color: #fff; font-weight: bold;">MONEDA</td>
          <td style="width: 30%; text-align: center; background-color: #2b6ce4; color: #fff; font-weight: bold;">CUENTA</td>
          <td style="width: 30%; text-align: center; background-color: #2b6ce4; color: #fff; font-weight: bold;">CODIGO INTERBAMCARIO</td>
        </tr>
        <tr>
          <td style="text-align: center;">BBVA</td>
          <td style="text-align: center;">DOLARES</td>
          <td style="text-align: center;">0011 0486 0100169898 82</td>
          <td style="text-align: center;">011 486 000100169898 82</td>
        </tr>
        <tr>
          <td style="text-align: center;">BBVA</td>
          <td style="text-align: center;">SOLES</td>
          <td style="text-align: center;">0011 0486 0100169871 89</td>
          <td style="text-align: center;">011 486 000100169871 89</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <br>
  <div class="pcs-template-body">
    <p style="text-align: center;font-weight: bold">CONDICIONES DE VENTA</p>
    <br>
    <span style="font-weight: bold;">DE LAS LICENCIAS DE USO</span>

    <p style="text-align: justify;">- 
      Las licencias asquiridas son por los progrmas ejecutables y NO incluye la ejecución de ninguna adecuación, modificacion o agredado al Softaware, nni los programas funete.
    </p>

    <p style="text-align: justify;"> - 
    Los precios cotizados son para la instalacion del Software en un local del cliente y en un servidor de Red local. Para otros locales y/o Servidores se deberá adquirir Licenciales del Sfotware.
    </p>
  
    <span style="font-weight: bold;">DE LAS INSTALACION DE LAS LICENICAS</span>
    
    <p style="text-align: justify;"> - 
    El servicio de instalación se dará dento de la 48 horas de confirmado el depposito por EL LICENCIANTE  en nuestras cunetas bancarias y l a firma del contrato por EL LICENCIATARIO, previa verificaión de cumplimiento de los requerimientos técnicos y de información que se solicite al cliente.
    </p>

    <span style="text-align: justify;"> - 
    La instalación se dará de forma Virtual (X) / Presencial ( )
    </span>
    
    <p style="text-align: justify;"> - 
    La instalación del Software se realizará en el Hardware que indique EL LICENCIATARIO que cumpla con los querimientos técnicos establecidos por EL LICENCIATARIO.
    </p>
    <p style="text-align: justify;"> - 
    los precios cotización no incluyen la intalación ni cinfiguración de Sistema Operativos, Redes locales, Bases de Datos, Internet, VPN, etc.
    </p>
    <span style="font-weight: bold;">DEL SERVICIO DE IMPLEMENTACION</span>
    <p style="text-align: justify;"> - 
    Es requisito indispensable que el LICENCIATARIO haya firmado el CONTRATO DE ADQUISICIÓN DE LICENCIA DE USO DE SOFTWARE para iniciar el Servicio de Implementación.
    </p>
    <p style="text-align: justify;"> - 
    La comunicación con el cliente se realizá  de las 72 horas de haber culminicado la instalación y haber cumplido el párrafon anterior, para establecer la fecha de revelamiento de información.
    </p>
    <p style="text-align: justify;"> - 
    El Servicio de implementación deaberá iniciar en le plazo masimo de 02 meses por EL LICENCIANTE, conatado desde la fecha de instalación del Software, luego del cual se considerá culminado. Pasado esta periodo se cobrará por estos Servicios. 
    </p>
    <span style="text-align: justify;"> - 
    La Licencia del Software cateogria Business (Contasis FEEI), consta de: Nivel de implementación  Avanzada ( X ), Y en su modalidad Full in Hause ( X ).
    </span>
    <p style="text-align: justify;"> - 
    Las activiadades a realizar en cada proceso de implementación están descritos en el documento NDI {Nivel de Implementación} que es firmado por el LICENCIATARIO dando conformidad a las mismas.
    </p>
    <p style="text-align: justify;"> - 
    La implementación se realiza solo para 01 empresa. En el caso, tenga más empresas a implementar, cada una tiene costo adicional previo relavamiento.
    </p>
    <p style="font-weight: bold">Modalidad de implementación</p>
    <p style="text-align: justify;"> - Full in House. Las actividades de relevamiento de información, configuración de formatos y capacitación especializada en el uso son realizadas al 100% en la oficina del LICENCIATARIO.</p>
    <p style="font-weight: bold;">DE LA CAPACITACIÓN GENERAL</p>
    <p style="text-align: justify;"> - 
    El cronograma la capacitación se envia dentro de las 48 horas habiles de haber culminado la instalación.
    </p>
    <p style="text-align: justify;"> - 
    Los Servicios de Capacitación General  en la operatividad del Software, deberán ejectarse dentro de un periodo maximo de 45 días, contados desde de fecha de instalación del Software, Pasado este periodo de cobrará por estos Servicios.
    </p>
    <p style="font-weight: bold;">DEL SERVICO DE SOPORTE</p>
    <p style="text-align: justify;"> - 
    El período de soporte inicia a partir de la fecha de instalación del software o renovación del servicio de mantenimiento anual.
    </p>
    <p style="text-align: justify;"> - 
    Solo en la primera adquisición la activación de soporte inica después de la capacitación y/o implementación correspondiente.
    </p>
    <p style="text-align: justify;"> - 
     El periodo de sopporte incia dspués de la capacitación y/o implementación correspondiente.
    </p>
    <p style="text-align: justify;"> - 
     EL LICENCIANTE brindará el servico de Soporte mediante Dr. Contasis (Customer Portal) que permite generar Tickets de Atención, Realizar el diagnóstico y platear la solución al problema presentado en el uso de Software.
    </p>
    <p style="text-align: justify;"> - 
     EL LICENCIATARIO debe contar con óptima conexión a internet para acceder al servicio de Soporte a través del Dr. Contasis (Customer Portal)
    </p>
    <p style="text-align: justify;"> - 
     Previamento que el usuraio que requiere el sservico de soporte deberá de haber asistido y aprobado la capacitación. No se dará soporte a usuarios no capacitados.
    </p>
    <p style="text-align: justify;"> - 
    El  servicio de soporte no incluye la instalacion y configuración de Sitemas Operativos, Redes locales, Basess de Datos, Internet, VPN y otras configuraciónes que no estén dentro del contrato.
    </p>
  </div>
</div>