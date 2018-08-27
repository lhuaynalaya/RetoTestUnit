<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StorePreferenciaOrdenVenta extends FormRequest {

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
            'cabecera' => array(
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'pie' => array(
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
          'cabecera.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'pie.regex' => 'El campo solo permite caracteres alfanúmericos.'
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
