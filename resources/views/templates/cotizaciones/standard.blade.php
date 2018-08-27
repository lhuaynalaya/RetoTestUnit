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
  
  .pcs-label {
    color: #333333;
  }
  
  .pcs-entity-title {
    font-size: 28pt;
    color: #000000;
  }
  
  .pcs-orgname {
    font-size: 10pt;
    color: #333333;
  }
  
  .pcs-customer-name {
    font-size: 9pt;
    color: #333333;
  }
  
  .pcs-itemtable-header {
    font-size: 9pt;
    color: #ffffff;
    background-color: #3c3d3a;
  }
  
  .pcs-itemtable-breakword {
    word-wrap: break-word;
  }
  
  .pcs-taxtable-header {
    font-size: 9pt;
    color: #000;
    background-color: #f5f4f3;
  }
  
  .itemBody tr {
    page-break-inside: avoid;
    page-break-after: auto;
  }
  
  .pcs-item-row {
    font-size: 9pt;
    border-bottom: 1px solid #adadad;
    background-color: #ffffff;
    color: #000000;
  }
  
  .pcs-item-sku {
    margin-top: 2px;
    font-size: 10px;
    color: #444444;
  }
  
  .pcs-item-desc {
    color: #727272;
    font-size: 9pt;
  }
  
  .pcs-balance {
    background-color: #f5f4f3;
    font-size: 9pt;
    color: #000000;
  }
  
  .pcs-totals {
    font-size: 9pt;
    color: #000000;
    background-color: #ffffff;
  }
  
  .pcs-notes {
    font-size: 8pt;
  }
  
  .pcs-terms {
    font-size: 8pt;
  }
  
  .pcs-header-first {
    background-color: #ffffff;
    font-size: 9pt;
    color: #333333;
    height: auto;
    
  }
  
  .pcs-status {
    font-size: 15pt;
    border: 3px solid;
    padding: 3px 8px;
  }
  
  
  .pcs-template-header {
    padding: 0 0.400000in 0 0.550000in;
    height: 0.700000in;
  }
  
  /* Additional styles for RTL compat */
  
  /* Helper Classes */
  
  .inline {
    display: inline-block;
  }
  
  .v-top {
    vertical-align: top;
  }
  
  .text-align-right {
    text-align: right;
  }
  
  .rtl .text-align-right {
    text-align: left;
  }
  
  .text-align-left {
    text-align: left;
  }
  
  .rtl .text-align-left {
    text-align: right;
  }
  
  /* Helper Classes End */
  
  .item-details-inline {
    display: inline-block;
    margin: 0 10px;
    vertical-align: top;
    max-width: 70%;
  }
  
  .total-in-words-container {
    width: 100%;
    margin-top: 10px;
  }
  
  .total-in-words-label {
    vertical-align: top;
    padding: 0 10px;
  }
  
  .total-in-words-value {
    width: 170px;
  }
  
  .total-section-label {
    padding: 5px 10px 5px 0;
    vertical-align: middle;
  }
  
  .total-section-value {
    width: 120px;
    vertical-align: middle;
    padding: 10px 10px 10px 5px;
  }
  
  .rtl .total-section-value {
    padding: 10px 5px 10px 10px;
  }
  
  /* Overrides/Patches for RTL compat */
  
  .rtl th {
    text-align: inherit;
    /* Specifically setting th as inherit for supporting RTL */
  }
  
  /* Overrides/Patches End */
  
  .lineitem-header {
    padding: 5px 10px 5px 5px;
    word-wrap: break-word;
  }
  
  .rtl .lineitem-header {
    padding: 5px 5px 5px 10px;
  }
  
  .lineitem-column {
    padding: 10px 10px 5px 10px;
    word-wrap: break-word;
    vertical-align: top;
  }
  
  .lineitem-content-right {
    padding: 10px 10px 10px 5px;
  }
  
  .rtl .lineitem-content-right {
    padding: 10px 5px 10px 10px;
  }
  
  .total-number-section {
    width: 45%;
    padding: 10px 10px 3px 3px;
    font-size: 9pt;
    float: left;
  }
  
  .rtl .total-number-section {
    float: right;
  }
  
  .total-section {
    width: 50%;
    float: right;
  }
  
  .rtl .total-section {
    float: left;
  }
</style>

<!--style_end-->

<div class="pcs-template ">
  
  <div id="header" class="pcs-template-header pcs-header-content">
  
  
  
  
  </div>
  
  
  <div class="pcs-template-body">
    
    <table style="width:100%;table-layout: fixed;">
      <tbody>
      <tr>
        <td style="vertical-align: top; width:50%;">
          <div>
          </div>
          <span class="pcs-orgname"><b>{{ $nombre_organizacion }}</b></span><br />
          <span class="pcs-label">
            <span id="tmp_org_address" style="white-space: pre-wrap;word-wrap: break-word;">Peru</span>
          </span>
        </td>
        <td class="text-align-right v-top" style="width:50%;">
          <span class="pcs-entity-title">COTIZACIÓN</span><br />
          <span class="pcs-label" style="font-size: 10pt;" id="tmp_entity_number"><b># {{ $numero_cotizacion }}</b></span>
          <div style="clear:both;margin-top:20px;">
            <span style="font-size:8pt;"><b>Total</b></span><br />
            <span style="font-size:12pt;"><b>{{ $total_formato }}</b></span>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
    
    <table style="clear:both;width:100%;margin-top:30px;table-layout:fixed;">
      <tr>
        <td style="width:60%;vertical-align:top;word-wrap: break-word;">
          <div><label id="tmp_billing_address_label" class="pcs-label" style="font-size: 10pt;">Cobrar a</label>
            <br />
            <span id="zb-pdf-customer-detail" class="pcs-customer-name">{{ $nombre_cliente }} </span><br />
          </div>
        </td>
        <td style="vertical-align:top;width: 40%;" align="right">
          <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;table-layout: fixed;word-wrap: break-word;">
            <tbody>
            <tr>
              <td class="text-align-right" style="width: 60%;padding:5px 10px 5px 0px;font-size:10pt;">
                <span class="pcs-label">Fecha de la cotización:</span>
              </td>
              <td class="text-align-right" style="width: 40%">
                <span id="tmp_entity_date">{{ $fecha }}</span>
              </td>
            </tr>
            <tr>
              <td class="text-align-right" style="padding:5px 10px 5px 0px;font-size: 10pt;">
                <span class="pcs-label">Fecha de envío:</span>
              </td>
              <td class="text-align-right">
                <span id="tmp_due_date">{{ $fecha_envio }}</span>
              </td>
            </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </table>
    
    <table cellpadding="0" cellspacing="0" border="0" class="pcs-itemtable" style="width:100%;margin-top:20px;table-layout:fixed;">
      <thead>
      <tr style="height:32px;">
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 0px 5px 5px;width: 5%;text-align: center;">
          #
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 20px;width: ;text-align: left;">
          Item &amp; Descripción
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 5px;width: 11%;text-align: right;">
          Cantidad
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 5px;width: 13%;text-align: right;">
          Valor Venta
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 5px;width: 15%;text-align: right;">
          Total
        </td>
      
      </tr>
      </thead>
      <tbody class="itemBody">
      @if(isset($cabecera) && $cabecera !== '')
        <tr>
          <td class="pcs-item-row" style="padding: 10px 0 10px 5px;text-align: center;word-wrap: break-word;" valign="top"></td>
          <td colspan="3" class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top">
            {{ $cabecera }}
          </td>
          <td class="pcs-item-row lineitem-column lineitem-content-right text-align-right">
            <span id="tmp_item_amount">{{ $sub_total }}</span>
          </td>
        </tr>
      @endif
      @if(isset($items))
        @foreach($items as $key => $item)
          <tr>
            <td class="pcs-item-row" style="padding: 10px 0 10px 5px;text-align: center;word-wrap: break-word;" valign="top">
              {{ $key + 1 }}
            </td>
            <td class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top">
              <div>
                <div>
                  <span id="tmp_item_name" style="word-wrap: break-word;">{{ $item['nombre'] }}</span><br />
                  @if(isset($item['descripcion']) && $item['descripcion'] !== '')
                    <span id="tmp_item_description" class="pcs-item-desc">{{ $item['descripcion'] }}</span>
                  @endif
                </div>
              </div>
            </td>
            <td class="pcs-item-row lineitem-column text-align-right">
              <span id="tmp_item_qty">{{ $item['cantidad'] }}</span>
              <div class="pcs-item-desc">{{ isset($item['unidad_medida']) ? $item['unidad_medida']: '' }}</div>
            </td>
            <td class="pcs-item-row lineitem-column text-align-right">
              <span id="tmp_item_rate">{{ isset($item['precio']) ? $item['precio']: '' }}</span>
            </td>
            <td class="pcs-item-row lineitem-column lineitem-content-right text-align-right">
              <span id="tmp_item_amount">{{ isset($item['total']) ? $item['total']: '' }}</span>
            </td>
          </tr>
        @endforeach
      @endif
      @if(isset($pie) && $pie !== '')
        <tr>
          <td class="pcs-item-row" style="padding: 10px 0 10px 5px;text-align: center;word-wrap: break-word;" valign="top"></td>
          <td colspan="3" class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top">
            {{ $pie }}
          </td>
          <td class="pcs-item-row lineitem-column lineitem-content-right text-align-right">
            <span id="tmp_item_amount">{{ $sub_total }}</span>
          </td>
        </tr>
      @endif
      
      </tbody>
    </table>
    <div style="width: 100%;margin-top: 1px;">
      <div class="v-top total-number-section">
        <div style="white-space: pre-wrap;"></div>
      
      </div>
      <div class="v-top total-section">
        <table width="100%" border="0" cellspacing="0" class="pcs-totals">
          <tbody>
          <tr>
            <td class="total-section-label text-align-right">Sub Total</td>
            <td class="total-section-value text-align-right" id="tmp_subtotal">{{ $sub_total }}</td>
          </tr>
          <tr>
            <td class="total-section-label text-align-right">Descuento</td>
            <td class="total-section-value text-align-right">
              (-) {{ $descuento }}
            </td>
          </tr>
          @if (isset($impuestos))
            @foreach($impuestos as $impuesto)
              <tr>
                <td class="total-section-label text-align-right">
                  {{ isset($impuesto['nombre_impuesto']) ? $impuesto['nombre_impuesto']: '' }}
                </td>
                <td class="total-section-value text-align-right">
                  {{ isset($impuesto['cantidad_impuesto']) ? $impuesto['cantidad_impuesto']: '' }}
                </td>
              </tr>
            @endforeach
          @endif
          <tr style="height:10px;">
            <td class="total-section-label text-align-right">Gastos envio</td>
            <td class="total-section-value text-align-right">{{ $gastos_envio }}</td>
          </tr>
          <tr style="height:10px;">
            <td class="total-section-label text-align-right">Ajustes</td>
            <td class="total-section-value text-align-right">{{ $ajuste }}</td>
          </tr>
          <tr>
            <td class="total-section-label text-align-right"><b>Total</b></td>
            <td class="total-section-value text-align-right" id="tmp_total"><b>{{ $total_formato }}</b></td>
          </tr>
          </tbody>
        </table>
      </div>
      <div style="clear: both;"></div>
    </div>
    
    
    
    
    
    <div style="clear:both;margin-top:50px;width:100%;">
      <label class="pcs-label" id="tmp_notes_label" style="font-size: 10pt;">Notas</label><br />
      <p class="pcs-notes" style="margin-top:7px;">{{ $notas }}</p>
    </div>
    
    
    
    <div style="clear:both;margin-top:30px;width:100%;">
      <label class="pcs-label" id="tmp_terms_label" style="font-size: 10pt;">Términos &amp; Condiciones</label><br />
      <p class="pcs-terms" style="margin-top:7px;">{{ $terminos_condiciones }}</p>
    </div>
  
  </div>
  
  <div class="pcs-template-footer">
    <div>
    
    </div>
  </div>
</div>