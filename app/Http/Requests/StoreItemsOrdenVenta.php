<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreItemsOrdenVenta extends FormRequest {

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
            'precio' => array(
              'regex: /^\d+(\.\d{1,2})?$/'
            ),
            'nombre' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'descuento' => array(
              'regex: /^\d+(\.\d{1,2})?$/'
            ),
            'impuesto_id' => array(
              'max:36'
            ),
            'producto_id' => array(
              'max:36'
            ),
            'sku' => array(
              'max:120',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'unidad_medida' => array(
              'max:120',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'porcentaje_impuesto' => array(
              'regex: /^\d+(\.\d{1,2})?$/'
            ),
            'total' => array(
              'regex: /^\d+(\.\d{1,2})?$/'
            ),
            'total_formato' => array(
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
          'precio.regex' => 'El campo solo permite numero decimales.',
          'nombre.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'descuento.regex' => 'El campo solo permite numero decimales.',
          'impuesto_id.max' => 'El campo debe de tener un máximo de 36 caracteres.',
          'producto_id.max' => 'El campo debe de tener un máximo de 36 caracteres.',
          'sku.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'sku.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'unidad_medida.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'unidad_medida.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'porcentaje_impuesto.regex' => 'El campo solo permite numero decimales.',
          'total.regex' => 'El campo solo permite numero decimales.',
          'total_formato.regex' => 'El campo solo permite numero decimales.'

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
