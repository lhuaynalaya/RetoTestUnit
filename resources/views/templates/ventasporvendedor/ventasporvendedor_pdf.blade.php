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
    color: ;
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
  <div class="pcs-template-body">
    
    <table style="width:100%;table-layout: fixed;">
      <tbody>
      <tr>
        <td colspan="2" style="text-align: center">
          <h1>{{ isset($nombre_organizacion) ? $nombre_organizacion: '' }}</h1>
          <h2>Ventas por Vendedor</h2>
          <h4>De {{ isset($fecha_inicio) ? $fecha_inicio: '' }} a {{ isset($fecha_final) ? $fecha_final: '' }}</h4>
        </td>
      </tr>
      </tbody>
    </table>
    
    
    <table cellpadding="0" cellspacing="0" border="0" class="pcs-itemtable" style="width:100%;margin-top:20px;table-layout:fixed;">
      <thead>
      <tr style="height:32px;">
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 0px 5px 5px;width: 10%;text-align: left;">
          Fecha
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 5px;width: 10%;text-align: right;">
          Estado
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 5px;width: 10%;text-align: right;">
          #Factura
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 5px;width: 10%;text-align: right;">
          Nombre Cliente
        </td>
        <td class="pcs-itemtable-header pcs-itemtable-breakword" id="" style="padding: 5px 10px 5px 5px;width: 10%;text-align: right;">
          Monto
        </td>
      </tr>
      </thead>
      <tbody class="itemBody">
      
      @if(isset($items))
        @foreach($items as $key => $item)
          <tr>
            <td class="pcs-item-row lineitem-column">
              {{ $item->fecha }}
            </td>
            <td class="pcs-item-row lineitem-column">
              {{ $item->estado }}
            </td>
            <td class="pcs-item-row lineitem-column">
              {{ $item->numero_factura }}
            </td>
            <td class="pcs-item-row lineitem-column">
              {{ $item->nombre_cliente }}
            </td>
            <td class="pcs-item-row lineitem-column">
              {{ $item->total_formato }}
            </td>
          </tr>
        @endforeach
      @endif
      
      </tbody>
    </table>
  </div>
  
  <div class="pcs-template-footer">
    <div>
    
    </div>
  </div>
</div>