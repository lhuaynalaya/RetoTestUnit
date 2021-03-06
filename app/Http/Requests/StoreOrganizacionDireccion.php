<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrganizacionDireccion extends FormRequest {

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
            'direccion_principal' => 'required|max:200'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El campo "organizacion_id" es obligatorio.',
            'direccion_principal.required' => 'El campo "Direccion Principal" es obligatorio.',
            'direccion_principal.max' => 'El campo "Direccion Principal" como máximo 200 caracteres.'
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
