<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreFabrica extends FormRequest {

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
            'nombre' => 'required|max:20|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
            'organizacion_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El campo "Nombre" es obligatorio.',
            'nombre.max' => 'El campo "Nombre" como máximo 20 caracteres.',
            'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'organizacion_id.required' => 'El campo "organizacion_id" es obligatorio.'
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
