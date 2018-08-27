<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCotizacionDocumento extends FormRequest {

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
            'mime_type' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'ruta' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'ruta_larga' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'usuario_creacion' => array(
              'max:36',
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
          'mime_type.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'mime_type.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'ruta.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'ruta.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'ruta_larga.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'ruta_larga.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'usuario_creacion.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'usuario_creacion.regex' => 'El campo solo permite caracteres alfanúmericos.'
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
