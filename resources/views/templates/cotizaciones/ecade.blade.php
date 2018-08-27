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
    text-align: center;
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
    float: left;
  }
  .pcs-negrita {
    font-weight: bold;
  }
  .pcs-negrita {
    font-weight: bold;
  }
  .pcs-financiamiento {
    font-weight: bold;
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
  .pcs-header-orden {
    font-weight: bold;
    float: right;
    padding: 7px;
    border: 2px solid black;
    border-radius: 6px;
  }
  .pcs-body-informacion {
     margin: 20px;
  }
  hr {
  background-color: black;
  }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  table, td, th {
    border: 1px solid black;
  }
  th {
    font-weight: bold;
    color: #121212;
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
    <span class="pcs-header-logo">
      <img src="images/ecade.jpg" style="width:200px; height: 80px">
    </span>
    <div style="text-align: justify-all; margin-left: 234px" >
      <span style="font-weight: bold;">
      CAPCHA & DE LA CRUZ SOCIEDAD CIVIL
      </span> 
      <br>    
      Av. Pablo Carriquiry N° 132 Of. 102      
      <br>    
      San Isidro, Lima,  
      <br>   
      Central Tel.:(01) 421-6236        
      <br>    
      RPM: #0278792 
      <br>

    </div>
    <span class="pcs-header-orden">Orden de Pedido: {{ $numero_cotizacion }}</span>
  </div>
  <br><br><br>
  <hr/>
  <div class="pcs-template-body">
    <div class="pcs-body-informacion">
      <span class="pcs-negrita">RAZON SOCIAL:
      </span><span>{{ $nombre_cliente }}</span>
      <br><br>
      <span class="pcs-negrita">RUC:
      </span><span>{{ $documento_cuenta }}</span>
      <br><br>
      <span class="pcs-negrita">DIRECCION:
      </span><span>{{ isset($cp_direccion) ? $cp_direccion: '' }}</span>
      <br><br>
      <span class="pcs-negrita">TELEFONOS:
      </span><span>{{ $cp_telefono }}</span>
      <br><br>
      <span class="pcs-negrita">CONTACTO:
      </span><span>{{ isset($atencion) ? $atencion: '' }}</span>
      <br><br>
      <span class="pcs-negrita">MOVIL:
      </span><span>{{ isset($cp_celular) ? $cp_celular: '' }}</span>
      <br><br>
       <span class="pcs-negrita">CONDICION DE PAGO:
      </span><span>{{ isset($metodo_pago) ? $metodo_pago: '' }}</span>
    </div>
  </div>
  <br><br>
  <div class="pcs-template-body">
    <div>
      <table>
        <thead>
          <tr>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">ÍTEM</th>
            <th style="width: 30%; padding-top: 3px; padding-bottom: 3px">DESCRIPCION</th>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">CANTIDAD</th>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">VALOR {{ $simbolo_moneda }}</th>
            <th style="width: 15%; padding-top: 3px; padding-bottom: 3px">PRECIO {{ $simbolo_moneda }}</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($cabecera) && $cabecera !== '')
            <tr>
              <td colspan="3" class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top">
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
                      <span id="tmp_item_name" style="word-wrap: break-word;">{{ $item['nombre'] }}</span>
                    </div>
                  </div>
                </td>
                <td class="pcs-item-row" style="padding: 10px 10px 10px 20px;" valign="top">
                  <div>
                    <div>
                      <span id="tmp_item_name" style="word-wrap: break-word;">
                      @if(isset($item['descripcion']) && $item['descripcion'] !== '')
                        <span id="tmp_item_description" class="pcs-item-desc">{!! nl2br($item['descripcion']) !!}</span>
                      @endif
                    </div>
                  </div>
                </td>
                <td class="pcs-item-row lineitem-column text-align-right" style="padding: 5px;">
                  <span id="tmp_item_qty">{{ $item['cantidad'] }}</span>
                  <div class="pcs-item-desc">{{ isset($item['unidad_medida']) ? $item['unidad_medida']: '' }}</div>
                </td>
                <td class="pcs-item-row lineitem-column text-align-right" style="padding: 5px;">
                  <span id="tmp_item_rate">{{ isset($item['precio']) ? number_format($item['precio'], 2): '' }}</span>
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
              <td colspan="4" class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top">
                {{ $pie }}
              </td>
              <td class="pcs-item-row lineitem-column lineitem-content-right text-align-right" style="padding: 5px;">
                <span id="tmp_item_amount">{{ isset($sub_total) ? number_format($sub_total, 2): '' }}</span>
              </td>
            </tr>
          @endif
          
          <tr>
            <td colspan="4" style="text-align: right; padding-right: 3px; font-weight: bold">Sub Total de Venta </td>
            <td style="text-align: right; color: #121212">
            <span style="float: left;">
                {{ $simbolo_moneda }}
            </span>
            {{ isset($sub_total) ? number_format($sub_total, 2): '' }}
            </td>
          </tr>

          @if (isset($impuestos))
            @foreach($impuestos as $impuesto)
              <tr>
                <td colspan="4" style="text-align: right; padding-right: 3px; font-weight: bold">
                  {{ isset($impuesto['nombre_impuesto']) ? $impuesto['nombre_impuesto']: '' }} 
                </td>
                <td style="text-align: right; color: #121212">
                  <span style="float: left;">
                     {{ $simbolo_moneda }}
                  </span>
                  {{ isset($impuesto['cantidad_impuesto']) ? number_format($impuesto['cantidad_impuesto'], 2): '' }}
                </td>
              </tr>
            @endforeach
          @endif

          @if (isset($total_bruto) && isset($total) && number_format($total_bruto, 2) !== number_format($total, 2))
            <tr>
              <td colspan="4" style="text-align: right; padding-right: 3px; font-weight: bold">Precio de Venta Total </td>
              <td style="text-align: right; color: #121212">
              <span style="float: left;">
                  {{ $simbolo_moneda }}
              </span>
              {{ isset($total_bruto) ? number_format($total_bruto, 2): '' }}
              </td>
            </tr>
  
            <tr>
              <td colspan="4" style="text-align: right; padding-right: 3px; font-weight: bold">Descuento 
                <br>
                 <span style="font-weight: normal;">{{ isset($descripcion_descuento) ? $descripcion_descuento: '' }}</span>
              </td>
              <td style="text-align: right; color: #121212">
              <span style="float: left; padding-top: 0px">
                  {{ $simbolo_moneda }}
              </span>
              (-) {{ isset($descuento) ? number_format($descuento, 2): '' }}
              </td>
            </tr>
            <tr>
              <td colspan="4" style="text-align: right; padding-right: 3px; font-weight: bold">Total inc. descuento </td>
              <td style="text-align: right;">
              <span style="float: left;">
                  <b>{{ $simbolo_moneda }}</b>
              </span>
              <b>{{ isset($total) ? number_format($total, 2): '' }}</b>
            </td>
            </tr>
          @else
            <tr>
              <td colspan="4" style="text-align: right; padding-right: 3px; font-weight: bold">Precio de Venta Total </td>
              <td style="text-align: right; color: #121212">
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
          </tr>
        </tbody>
      </table>
    </div>
    <br><br>  
    @if (isset($es_financiado) && $es_financiado)
      <div style="margin-left: 40px;">
        <span class="pcs-financiamiento"><u>Financiamiento: Precio en nuevos soles</u></span>
        <br><br>
        <span>Inicial de:</span>
        @if ($tipo_pago_inicial == '%')
        <span>{{ $porcentaje_inicial }} {{ $tipo_pago_inicial }}</span>
        @endif
        <span style="padding-left: 252px;">{{ $simbolo_moneda }} {{ $pago_inicial }} Inc. IGV</span>
        <br><br>
        <span>Saldo al culminar el proceso de implementación y capacita.</span>
        <span style="padding-left: 32px;"> {{ $simbolo_moneda }} {{ $valor_cuota }} Inc. IGV</span>
      </div>
    @endif
    <br>
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