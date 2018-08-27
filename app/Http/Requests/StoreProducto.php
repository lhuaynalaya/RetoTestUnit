<?php namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreProducto extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $id = '';
      if ($this->segments() !== null && count($this->segments()) > 0) {
        $id = $this->segments()[count($this->segments()) - 1];
      }

      $organizacion_id = $this->input('organizacion_id');

      $validators = [
        'nombre' => array(
          'required',
          'max:200',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_.\-\(\) ]*$/',
          'unico:productos,nombre,' . $id . ',' . $organizacion_id
        ),
        'sku' => array(
          'required',
          'max:120',
          'regex:/^[a-zA-Z0-9_.\- ]*$/',
          'unico:productos,sku,' . $id . ',' . $organizacion_id
        ),
        'unidad_medida' => array(
          'required',
          'max:120',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'fabricante' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'marca' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'descripcion_compra' => array(
          'max:6000',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_.,-\/\n ]*$/'
        )
      ];

      if ($this->attributes->get('tipo_item') === 'ventas') {
        $validators['precio_venta'] = array('required', 'regex:/^(\d+(\.\d{1,2})?)?$/');
        $validators['precio_compra'] = array('nullable', 'regex:/^(\d+(\.\d{1,2})?)?$/');
        $validators['moneda_id'] = array('required');
      } else if ($this->attributes->get('tipo_item') === 'compras') {
        $validators['precio_venta'] = array('nullable', 'regex:/^(\d+(\.\d{1,2})?)?$/');
        $validators['precio_compra'] = array('required', 'regex:/^(\d+(\.\d{1,2})?)?$/');
        $validators['moneda_compra_id'] = array('required');
      } else if ($this->attributes->get('tipo_item') === 'ventas_y_compras') {
        $validators['precio_venta'] = array('required', 'regex:/^(\d+(\.\d{1,2})?)?$/');
        $validators['precio_compra'] = array('required', 'regex:/^(\d+(\.\d{1,2})?)?$/');
        $validators['moneda_id'] = array('required');
        $validators['moneda_compra_id'] = array('required');
      }

      return $validators;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'nombre.required' => 'El campo es obligatorio.',
          'nombre.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'nombre.unico' => 'El valor de este campo ya existe.',
          'sku.required' => 'El campo es obligatorio.',
          'sku.max' => 'El campo debe de tener un máximo de 120 caracteres.',
          'sku.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'sku.unico' => 'El valor de este campo ya existe.',
          'unidad_medida.max' => 'El campo debe de tener un máximo de 120 caracteres.',
          'unidad_medida.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fabricante.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'fabricante.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'marca.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'marca.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'precio_venta.required' => 'El campo es obligatorio.',
          'precio_venta.regex' => 'Por favor asegurese que el valor sea válido.',
          'moneda_id.required' => 'El campo es obligatorio.',
          'precio_compra.required' => 'El campo es obligatorio.',
          'precio_compra.regex' => 'Por favor asegurese que el valor sea válido.',
          'moneda_compra_id.required' => 'El campo es obligatorio.',
          'descripcion_compra.max' => 'El campo debe de tener un máximo de 6000 caracteres.',
          'descripcion_compra.regex' => 'El campo solo permite caracteres alfanúmericos.'
        ];
    }

    /**
     * @param Validator $validator
     * @return mixed
     */
    public function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

    protected function failedValidation(Validator $validator) {
      throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
