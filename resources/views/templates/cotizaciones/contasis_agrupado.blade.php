<!--The below style_start tag has to be present as it is used to substring the style content from the body html-->

<!--style_start-->
<style type="text/css" media="all">
  @font-face {
    font-family: 'Open Sans', sans-serif;
    src: url(https://fonts.googleapis.com/css&#63;family=Open+Sans);
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
  
  .text-align-right {
    text-align: right;
  }
  
  .rtl .text-align-right {
    text-align: left;
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
      <span>Código Cotización: {{ $numero_cotizacion }}</span>
      <br>
      <span>Estimado cliente: {{ $nombre_cliente }}</span>
      <br>
      <span>Atención: {{ isset($atencion) ? $atencion: '' }}</span>
      <br>
      <br>
      <span>A continuación detallamos los costos de la Cuota de Mantenimiento Anual:</span>
    </div>
  </div>
  <div class="pcs-template-body">
    <div>
      <table>
        <thead>
        <tr>
          <th style="width: 70%; padding-top: 3px; padding-bottom: 3px">Detalle del Producto</th>
          <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">Cantidad</th>
          <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">Precio Total de Venta {{ $simbolo_moneda }}</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($cabecera) && $cabecera !== '')
          <tr>
            <td colspan="2" class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top">
              {{ $cabecera }}
            </td>
            <td class="pcs-item-row lineitem-column lineitem-content-right text-align-right" style="padding: 5px;">
              <span id="tmp_item_amount">{{ isset($sub_total) ? number_format($sub_total, 2): '' }}</span>
            </td>
          </tr>
        @endif
        
        @if(isset($items))
          @foreach($items as $key => $item)
            <tr>
              <td class="pcs-item-row" style="padding: 10px 10px 10px 20px;" valign="top">
                <div>
                  <div>
                    <span id="tmp_item_name" style="word-wrap: break-word;">{{ $item['nombre'] }}</span><br />
                    @if(isset($item['descripcion']) && $item['descripcion'] !== '')
                      <span id="tmp_item_description" class="pcs-item-desc">{!! nl2br($item['descripcion']) !!}</span>
                    @endif
                  </div>
                </div>
              </td>
              <td class="pcs-item-row lineitem-column" style="padding: 5px; text-align: center;">
                <span id="tmp_item_qty">{{ $item['cantidad'] }}</span>
                <div class="pcs-item-desc">{{ isset($item['unidad_medida']) ? $item['unidad_medida']: '' }}</div>
              </td>
              <td class="pcs-item-row lineitem-column lineitem-content-right text-align-right" style="padding: 5px;">
                <span id="tmp_item_amount" style="width: 100%; display: inline-block; position:relative;">
                  <span style="float: left;">
                  {{ $simbolo_moneda }}
                  </span>
                  <span style="text-align: right">
                    {{ isset($item['total']) ? number_format($item['total'], 2): '' }}
                  </span>
                </span>
              </td>
            </tr>
          @endforeach
        @endif
        
        @if(isset($pie) && $pie !== '')
          <tr>
            <td colspan="2" class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top">
              {{ $pie }}
            </td>
            <td class="pcs-item-row lineitem-column lineitem-content-right text-align-right" style="padding: 5px;">
              <span id="tmp_item_amount">{{ isset($sub_total) ? number_format($sub_total, 2): '' }}</span>
            </td>
          </tr>
        @endif
        
        <tr>

          <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">Sub Total de Venta</td>
          <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">
            <span style="float: left;">
              {{ $simbolo_moneda }}
            </span>
            {{ isset($sub_total) ? number_format($sub_total, 2): '' }}
          </td>

        </tr>
        
        @if (isset($impuestos))
          @foreach($impuestos as $impuesto)
            <tr>
              <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">
                {{ isset($impuesto['nombre_impuesto']) ? $impuesto['nombre_impuesto']: '' }}
              </td>
              <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">
                <span style="float: left;">
                  {{ $simbolo_moneda }}
                </span>

                {{ isset($impuesto['cantidad_impuesto']) ? number_format($impuesto['cantidad_impuesto'], 2): '' }}
              </td>
            </tr>
          @endforeach
        @endif
        
        {{--<tr>--}}
        {{--<td colspan="3" style="text-align: right; padding-right: 3px; font-weight: bold">Gastos envio $</td>--}}
        {{--<td style="text-align: right; background-color: #2b6ce4; color: #ffffff">{{ $gastos_envio }}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td colspan="3" style="text-align: right; padding-right: 3px; font-weight: bold">Ajustes $</td>--}}
        {{--<td style="text-align: right; background-color: #2b6ce4; color: #ffffff">{{ isset($ajuste) ? number_format($ajuste, 2): '' }}</td>--}}
        {{--</tr>--}}
        @if (isset($total_bruto) && isset($total) && number_format($total_bruto, 2) !== number_format($total, 2))
          <tr>
            <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">Total</td>
            <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">
              <span style="float: left;">
                {{ $simbolo_moneda }}
              </span>
              {{ isset($total_bruto) ? number_format($total_bruto, 2): '' }}
            </td>
          </tr>
          
          <tr>
            <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">
              Descuento&nbsp;
              @if(isset($tipo_descuento) && $tipo_descuento == '%')
                @if (isset($descuento_formato))
                  ({{ $descuento_formato }}%)
                @endif
              @endif
                <br>
                <span style="font-weight: normal;">{{ isset($descripcion_descuento) ? $descripcion_descuento: '' }}</span>
            </td>
            <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">
              <span style="float: left; padding-top: 0px">
                  {{ $simbolo_moneda }}
              </span>
              (-) {{ isset($descuento) ? number_format($descuento, 2): '' }}
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">Total Inc. Descuento</td>
            <td style="text-align: right; background-color: #FFFF00;">
              <span style="float: left;">
                <b>{{ $simbolo_moneda }}</b>
              </span>
              <b>{{ isset($total) ? number_format($total, 2): '' }}</b>
            </td>
          </tr>
        @else
          <tr>
            <td colspan="2" style="text-align: right; padding-right: 3px; font-weight: bold">Total</td>
            <td style="text-align: right; background-color: #2b6ce4; color: #ffffff">
              <span style="float: left;">
                {{ $simbolo_moneda }}
              </span>
              {{ isset($total) ? number_format($total, 2): '' }}
            </td>
          </tr>
        @endif
        
        </tbody>
      </table>
      <table style="padding-top: -2px">
        <tbody>
        <tr>
          @if (isset($es_contado) && $es_contado)
            <td>
              <span style="font-weight: bold;padding-left: 6px;text-decoration-line: underline;">Condiciones y Forma de Pago</span>
              <br>
              <span style="padding-left: 6px;">Al contado Dscto </span> <span style="padding-left: 50px;">{{ isset($descuento_contado_formato) ? $descuento_contado_formato: '' }}</span>
              <br>
              <span style="padding-left: 6px;" ></span><span style="padding-left: 40px;">{{ isset($subtotal_contado_formato) ? $subtotal_contado_formato: '' }}</span><span style="padding-left: 30px;">Incluido IGV</span>
            </td>
          @endif
          
          @if (isset($es_financiado) && $es_financiado)
            <td>
              <span style="font-weight: bold;padding-left: 6px;text-decoration-line: underline;">Financiamiento</span>
              <br>
              <span style="padding-left: 6px;">Inicial </span>
              @if ($tipo_pago_inicial == '%')
                <span style="padding-left: 30px;">{{ $porcentaje_inicial }} {{ $tipo_pago_inicial }}</span>
              @endif
              <span  style="padding-left: 50px;">$</span> <span style="padding-left: 20px;">{{ $pago_inicial }}</span><span style="padding-left: 30px;">Inc. IGV</span>
              <br>
              <span style="padding-left: 6px;">{{ $numero_cuotas_financiar }}</span><span style="padding-left: 50px;">Cuotas de </span><span style="padding-left: 32px;">$</span><span style="padding-left: 22px;">{{ $valor_cuota }}</span><span style="padding-left: 30px;">Inc. IGV</span>
            </td>
          @endif
        
        </tr>
        </tbody>
      </table>
    </div>
    <br>
    <div style="margin-left: 40px;">
      <span>Vigencia de la proforma: Hasta el {{ isset($valido_hasta) ? $valido_hasta: '' }}</span>
      <br>
      <span>Si en caso realiza el pago en soles considerar T.C Sunat Venta del día</span>
      <br>
      <br>

      <span>
        <b>IMPORTANTE:</b> <br>Para efectos de una adecuada identificación y bancarización, que nos permitirá atenderlo en los plazos establecidos, cuando usted realiza el pago debe dar de dato el RUC (Para emisión de Factura) o DNI (Para emisión de Boleta de Venta) de la persona jurídica o natural a la cual se le va a emitir el Comprobante de Pago y deberá figurar como nuestro cliente. En caso usted omita lo indicado, no podremos emitirle el comprobante de pago y la atención podría demorar más de lo previsto.
      </span>
      <br>
      <br>
      <span>
        <u><b>CONDICIONES DE LA PROPUESTA</b></u>:<br> 
        -Las actualizaciones las realiza el mismo cliente usuario del Sistema Contasis
        con el Manual de Actualización que se le envía previa recepción del pago de la plataforma. Esto beneficia al cliente para
        realizar la actualización y licenciamiento en el horario que se acomode a su necesidad.<br>
        -En el caso, que el cliente desee que la Actualización la realice uno de nuestros consultores el costo adicional es el siguiente:
      </span>
      <br>
      <br>

      <div style="margin-left: 10px; margin-right: 20px;">
      <table>
        <thead>
        <tr>
          <th colspan="3">Precios del Servicio Adicional - Actualización Asistida</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td style="width: 30%; text-align: center; background-color: #2b6ce4; color: #fff; font-weight: bold;">Rangos</td>
          <td style="width: 30%; text-align: center; background-color: #2b6ce4; color: #fff; font-weight: bold;">Virtual</td>
          <td style="width: 30%; text-align: center; background-color: #2b6ce4; color: #fff; font-weight: bold;">Presencial</td>
        </tr>
        <tr>
          <td style="text-align: center;">1 a 3 Licencias</td>
          <td style="text-align: center;">USD 60.00+IGV</td>
          <td style="text-align: center;">USD 100.00+IGV</td>
        </tr>
        <tr>
          <td style="text-align: center;">4 a 7 Licencias</td>
          <td style="text-align: center;">USD 80.00+IGV</td>
          <td style="text-align: center;">USD 120.00+IGV</td>
        </tr>
        <tr>
          <td style="text-align: center;">Más de 7 Licencias</td>
          <td style="text-align: center;">USD 100.00+IGV</td>
          <td style="text-align: center;">USD 140.00+IGV</td>
        </tr>
        </tbody>
      </table>
      </div>
      <br>
      <b>*Este servicio se realizará via online, en horario de oficina y previa programación de fecha, hora y consultor asignado
      para realizar dicho proceso.</b>
      <br>
      <br>
      {{--<span>Pagos a través de BCP verificar procedimiento adjunto <a href="http://videocontasis.com/classonlive/PAGOS%20BCP/PAGOS%20EN%20BCP.pdf" target="_blank">Click aquí</a></span>--}}
      <br>
      <span>El pago se puede realizar a una de las cuentas que aparecen a continuación:</span>
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
        <tr>
            <td style="text-align: center;">BCP</td>
            <td style="text-align: center;">DOLARES</td>
            <td style="text-align: center;">193 2484311 1 59</td>
            <td style="text-align: center;">002 193 002484311159 12</td>
          </tr>
          <tr>
            <td style="text-align: center;">BCP</td>
            <td style="text-align: center;">SOLES</td>
            <td style="text-align: center;">193 2521963 0 72</td>
            <td style="text-align: center;">002 193 002521963072 17</td>
          </tr>
          <tr>
            <td style="text-align: center;">BANCO DE LA NACIÓN</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;">00 008 020779</td>
            <td style="text-align: center;"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  
  <div class="pcs-template-body">
    @if (isset($notas) && $notas !== '')
      <div style="clear:both;margin-top:50px;width:100%;">
        <label class="pcs-label" id="tmp_notes_label" style="font-size: 10pt;">Notas</label><br />
        <p class="pcs-notes" style="margin-top:7px;">{{ $notas }}</p>
      </div>
    @endif
    @if (isset($terminos_condiciones) && $terminos_condiciones !== '')
      <div style="clear:both;margin-top:30px;width:100%;">
        <label class="pcs-label" id="tmp_terms_label" style="font-size: 10pt;">Términos &amp; Condiciones</label><br />
        <p class="pcs-terms" style="margin-top:7px;">{{ $terminos_condiciones }}</p>
      </div>
    @endif
    
    <br>
    <br>
    @if (isset($link_firma) && $link_firma !== '')
      <img src="{{ $link_firma }}">
    @endif
  </div>
</div>