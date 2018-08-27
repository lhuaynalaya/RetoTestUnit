<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCampoPersonalizado extends FormRequest {

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
            'organizacion_id' => 'required',
            'etiqueta' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
            'tipo_dato' => 'required|max:255'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El campo "organizacion_id" es obligatorio.',
            'etiqueta.required' => 'El campo "etiqueta" es obligatorio.',
            'etiqueta.max' => 'El campo "etiqueta" como máximo 255 caracteres.',
            'etiqueta.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'tipo_dato.required' => 'El campo "tipo dato" es obligatorio.',
            'tipo_dato.max' => 'El campo "tipo dato" como máximo 255 caracteres.'
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
