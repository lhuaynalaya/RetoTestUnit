<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreFacturaComentario extends FormRequest {

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
            'descripcion' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'fecha_formato' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'fecha' => array(
                'regex:/^((\d{2})\/(\d{2})\/(\d{4}))*$/'
            ),
            'tiempo' => array(
                'regex:/^((\d{2})\/(\d{2})\/(\d{4}))*$/'
            ),
            'tipo_comentario' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
           'tipo_transaccion' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
           'tipo_operacion' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            )
             
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'descripcion.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'descripcion.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fecha_formato.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'fecha_formato.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fecha.regex' => 'El campo solo permite caracteres fecha.',
          'tiempo.regex' => 'El campo solo permite caracteres fecha.',
          'fecha.regex' => 'El campo solo permite caracteres fecha.',
          'tipo_comentario.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'tipo_comentario.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'tipo_transaccion.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'tipo_transaccion.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'tipo_operacion.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'tipo_operacion.regex' => 'El campo solo permite caracteres alfanúmericos.'
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
