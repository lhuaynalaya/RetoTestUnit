<?php namespace  App\Http\Data;

class DataCanal {
  public function inicial($organizacion_id) {
    return [
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Canal Directo'
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Canal Web'
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Canal PostVenta'
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Canal Referenciadores '
      ]
    ];
  }
}