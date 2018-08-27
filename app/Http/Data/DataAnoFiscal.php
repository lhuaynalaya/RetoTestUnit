<?php namespace  App\Http\Data;

class DataAnoFiscal {
  public function inicial($organizacion_id) {
    return [
        [
            'nombre' => 'Enero-Diciembre',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Febrero-Enero',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Marzo-Febrero',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Abril-Marzo',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Mayo-Abril',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Junio-Mayo',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Julio-Junio',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Agosto-Julio',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Setiembre-Agosto',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Octubre-Setiembre',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Noviembre-Octubre',
            'organizacion_id' => $organizacion_id
        ],
        [
            'nombre' => 'Diciembre-Noviembre',
            'organizacion_id' => $organizacion_id
        ]
    ];
  }
}