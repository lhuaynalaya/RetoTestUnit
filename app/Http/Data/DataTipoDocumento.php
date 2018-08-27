<?php namespace  App\Http\Data;

class DataTipoDocumento {
  public function inicial($organizacion_id) {
    return [
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'RUC'
      ],
      [
        'organizacion_id' => $organizacion_id,
        'nombre' => 'DNI'
      ]
    ];
  }
}