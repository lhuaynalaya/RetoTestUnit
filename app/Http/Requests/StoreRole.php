<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRole extends FormRequest {

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
            'descripcion' => 'nullable',
            'nombre' => 'required|max:100'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El campo "organizacion_id" es obligatorio.',
            'nombre.required' => 'El campo "nombre" es obligatorio.',
            'nombre.max' => 'El campo "Nombre" como máximo 100 caracteres.'
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
