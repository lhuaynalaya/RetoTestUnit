<?php namespace  App\Http\Data;

class DataImpuesto {
  public function inicial($organizacion_id) {
    return [
      [
        'organizacion_id' => $organizacion_id,
        'porcentaje' => 18,
        'codigo' => 'IGV',
        'nombre' => 'Impuesto General a las Ventas',
        'descripcion' => 'El IGV o Impuesto General a las Ventas es un impuesto que grava todas las fases del ciclo de producción y distribución, está orientado a ser asumido por el consumidor final, encontrándose normalmente en el precio de compra de los productos que adquiere'
      ]
    ];
  }
}