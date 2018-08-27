<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCotizacion extends FormRequest {

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

      $validators = [
        'organizacion_id' => array(
          'required'
        ),
        'numero_cotizacion' => array(
          'required',
          'max:200',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_.\- ]*$/'
        ),
        'numero_referencia' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'fecha' => array(
          'nullable',
          'regex:/^((\d{2})\/(\d{2})\/(\d{4}))*$/'
        ),
        'fecha_envio' => array(
          'nullable',
          'regex:/^((\d{2})\/(\d{2})\/(\d{4}))*$/'
        ),
        'direccion_facturacion_id' => array(
          'nullable',
          'max:36',
        ),
        'direccion_envio_id' => array(
          'nullable',
          'max:36',
        ),
        'descuento' => array(
          'nullable',
          'regex: /^\d+(\.\d{1,2})?$/'
        ),
        'metodo_pago' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'metodo_envio' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'nombre_cliente' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/'
        ),
        'simbolo_moneda' => array(
          'max:20',
          'nullable'
        ),
        'codigo_moneda' => array(
          'max:20',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'sub_total' => array(
          'regex: /^\d+(\.\d{1,2})?$/',
          'nullable'
        ),
        'total_impuestos' => array(
          'nullable',
          'regex: /^\d+(\.\d{1,2})?$/'
        ),
        'total' => array(
          'nullable',
          'regex: /^\d+(\.\d{1,2})?$/'
        )
      ];

      
      return $validators;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'organizacion_id.required' => 'El campo es obligatorio.',
          'numero_cotizacion.required' => 'El campo es obligatorio.',
          'numero_cotizacion.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'numero_cotizacion.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'numero_referencia.max' => 'El campo debe de tener un máximo de 120 caracteres.',
          'numero_referencia.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fecha.regex' => 'El campo solo permite caracteres fecha.',
          'fecha_envio.regex' => 'El campo solo permite caracteres fecha.',
          'direccion_facturacion_id.max' => 'El campo debe de tener un máximo de 36 caracteres.',
          'direccion_envio_id.max' => 'El campo debe de tener un máximo de 36 caracteres.',
          'descuento.regex' => 'El campo solo permite numero decimales.',
          'metodo_pago.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'metodo_pago.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'metodo_envio.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'metodo_envio.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'nombre_cliente.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'nombre_cliente.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'simbolo_moneda.max' => 'El campo debe de tener un máximo de 20 caracteres.',
          'simbolo_moneda.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'codigo_moneda.max' => 'El campo debe de tener un máximo de 20 caracteres.',
          'codigo_moneda.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'sub_total.regex' => 'El campo solo permite numero decimales.',
          'total_impuestos.regex' => 'El campo solo permite numero decimales.',
          'total.regex' => 'El campo solo permite numero decimales.'
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
