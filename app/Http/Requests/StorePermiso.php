<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePermiso extends FormRequest {

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
            'organizacion_id' => array(
              'required'
            ),
            'entidad' => array(
              'max:255',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'entidad_formato' => array(
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
          'organizacion_id.required' => 'El campo es obligatorio.',
          'entidad.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'entidad.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'entidad_formato.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'entidad_formato.regex' => 'El campo solo permite caracteres alfanúmericos.'
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
