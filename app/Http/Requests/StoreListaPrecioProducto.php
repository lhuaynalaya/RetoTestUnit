<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreListaPrecioProducto extends FormRequest {

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
        return [
          'lista_precio_id' => array(
              'required'
          ),
          'organizacion_id' => array(
              'required'
          ),
          'producto_id' => array(
              'required'
          ),
          'nombre_producto' => array(
              'required',
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
          ),
          'tarifa' => array(
              'regex: /^\d+(\.\d{1,2})?$/'
          ),
          'tarifa_formateada' => array(
              'regex: /^\d+(\.\d{1,2})?$/'
          ),
          'tarifa_personalizada' => array(
              'regex: /^\d+(\.\d{1,2})?$/'
          )
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'lista_precio_id.required' => 'El campo es obligatorio.',
          'organizacion_id.required' => 'El campo es obligatorio.',
          'producto_id.required' => 'El campo es obligatorio.',
          'nombre.required' => 'El campo es obligatorio.',
          'nombre.max' => 'El campo debe de tener un máximo de 120 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'tarifa.regex' => 'El campo solo permite números decimales.',
          'tarifa_formateada.regex' => 'El campo solo permite números decimales.',
          'tarifa_personalizada.regex' => 'El campo solo permite números decimales.'

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
