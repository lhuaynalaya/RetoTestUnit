<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreModeloEntidad extends FormRequest {

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
            'entidad' => array(
              'required',
              'max:100',
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
          'entidad.required' => 'El campo es obligatorio.',
          'entidad.max' => 'El campo debe de tener un máximo de 100 caracteres.',
          'entidad.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'usuario_creacion.max' => 'El campo debe de tener un máximo de 36 caracteres.',
          'usuario_creacion.regex' => 'El campo solo permite caracteres alfanúmericos.',
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
