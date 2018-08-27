<?php namespace  App\Http\Data;

class DataTipoCuenta {
  public function inicial($organizacion_id) {
    return [
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Posible Cliente'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Cliente'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Proveedor'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Distribuidor'
        ]
    ];
  }
}