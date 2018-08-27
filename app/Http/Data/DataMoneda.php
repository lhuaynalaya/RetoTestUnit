<?php namespace  App\Http\Data;

class DataMoneda {
  public function inicial($organizacion_id) {
    return [
      [
        'organizacion_id' => $organizacion_id,
        'codigo_pais' => 'PE',
        'codigo' => 'PEN',
        'nombre' => 'Soles',
        'simbolo' => 'S/',
        'es_por_defecto' => 1
      ],
      [
        'organizacion_id' => $organizacion_id,
        'codigo_pais' => 'US',
        'codigo' => 'USD',
        'nombre' => 'US Dollar',
        'simbolo' => '$',
        'es_por_defecto' => 0
      ]
    ];
  }
}