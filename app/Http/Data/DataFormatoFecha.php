<?php namespace  App\Http\Data;

class DataFormatoFecha {
  public function inicial($organizacion_id) {
    return [
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'MM/dd/yy [11/23/18]',
            'formato' => 'MM/dd/yy'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'dd/MM/yy [23/11/18]',
            'formato' => 'dd/MM/yy'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'yy/MM/dd [18/11/23]',
            'formato' => 'yy/MM/dd'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'MM/dd/yyyy [11/23/2018]',
            'formato' => 'MM/dd/yyyy'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'dd/MM/yyyy [23/11/2018]',
            'formato' => 'dd/MM/yyyy'
        ],
        [
            'organizacion_id' => $organizacion_id,
            'nombre' => 'yyyy/MM/dd [2018/11/23]',
            'formato' => 'yyyy/MM/dd'
        ]
    ];
  }
}