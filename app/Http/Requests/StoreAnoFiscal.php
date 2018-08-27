<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAnoFiscal extends FormRequest {

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
        'nombre' => array(
          'required',
          'max:255',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'organizacion_id' => array(
            'required'
        )
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'nombre.required' => 'El campo es obligatorio.',
          'nombre.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'organizacion_id.required' => 'El campo es obligatorio requiere organizacion'
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
