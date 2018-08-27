<?php namespace  App\Http\Data;

class DataTipoDocumentoContacto {
  public function inicial($organizacion_id) {
    return [
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'DNI',
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Carné de extranjería',
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'Pasaporte',
      ]
    ];
  }
}