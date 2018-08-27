<?php namespace  App\Http\Data;

class DataTipoComprobante {
  public function inicial($organizacion_id) {
    return [
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Factura'
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Boleta'
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Nota de Pedido'
      ]
    ];
  }
}