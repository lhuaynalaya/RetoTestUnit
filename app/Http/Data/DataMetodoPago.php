<?php namespace  App\Http\Data;

class DataMetodoPago {
  public function inicial($organizacion_id) {
    return [
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Crédito'
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Contado'
      ]
    ];
  }
}