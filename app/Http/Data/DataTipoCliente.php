<?php namespace  App\Http\Data;

class DataTipoCliente {
  public function inicial($organizacion_id) {
    return [
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Empresa'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Contador'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Estudio Contable'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Empresa PRICO'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'Empresa PRICO NACIONAL'
        ]
    ];
  }
}