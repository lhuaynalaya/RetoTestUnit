<?php namespace  App\Http\Data;

class DataTipoRedondeo {
  public function inicial($organizacion_id) {
    return [
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'No importa'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Número entero más cercano'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => '0.99'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => '0.50'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => '0.49'
        ]
    ];
  }
}