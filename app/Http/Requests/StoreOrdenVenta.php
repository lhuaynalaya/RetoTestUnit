<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrdenVenta extends FormRequest {

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

        return [
          'cliente_id' => array(
            'required'
          ),
          'numero_orden' => array(
            'required',
            'max:200',
            'regex:/^[a-zA-Z0-9-. ]*$/',
            //'unico:ordenes_venta,numero_orden,' . $id . ',' . $organizacion_id
          ),
          'numero_referencia' => array(
            'max:200',
            'nullable',
            'regex:/^[a-zA-Z0-9-. ]*$/',
          ),
          'fecha' => array(
            'required',
            'regex:/^((\d{2})\/(\d{2})\/(\d{4}))*$/',
          ),
          'fecha_envio' => array(
            'nullable',
            'regex:/^((\d{2})\/(\d{2})\/(\d{4}))*$/',
          ),
          'metodo_pago' => array(
            'nullable',
            'max:120',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
          ),
          'metodo_envio' => array(
            'nullable',
            'max:120',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
          ),
          'descuento' => array(
            'nullable',
            'regex:/^(\d+(\.\d{1,2})?)?$/',
          ),
          'gastos_envio' => array(
            'nullable',
            'regex:/^(\d+(\.\d{1,2})?)?$/',
          ),
          'ajuste' => array(
            'nullable',
            'regex:/^(\d+(\.\d{1,2})?)?$/',
          ),
          'descripcion_ajuste' => array(
            'nullable',
            'max:200',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9ñÑ_. ]*$/',
          ),
          'notas' => array(
            'max:6000',
            'nullable',
            'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_.,-\/\n ]*$/'
          ),
          'terminos' => array(
            'max:6000',
            'nullable',
            'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_.,-\/\n ]*$/'
          )
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'cliente_id.required' => 'El campo es obligatorio.',
          'numero_orden.required' => 'El campo es obligatorio.',
          'numero_orden.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'numero_orden.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'numero_orden.unico' => 'El número de orden ya existe.',
          'numero_referencia.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'numero_referencia.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fecha.required' => 'El campo es obligatorio.',
          'fecha.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fecha_envio.regex' => 'El valor del campo es inválido.',
          'metodo_pago.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'metodo_pago.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'metodo_envio.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'metodo_envio.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'descuento.regex' => 'Por favor asegurese que el valor sea válido.',
          'gastos_envio.regex' => 'Por favor asegurese que el valor sea válido.',
          'ajuste.regex' => 'Por favor asegurese que el valor sea válido.',
          'descripcion_ajuste.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'descripcion_ajuste.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'notas.max' => 'El campo debe de tener un máximo de 6000 caracteres.',
          'notas.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'terminos.max' => 'El campo debe de tener un máximo de 6000 caracteres.',
          'terminos.regex' => 'El campo solo permite caracteres alfanúmericos.'
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
