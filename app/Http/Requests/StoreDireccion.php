<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDireccion extends FormRequest {

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
            'direccion_principal' => 'required|max:200',
            'direccion_secundaria' => 'nullable|max:200',
            'atencion' => 'nullable|max:200',
            'telefono' => 'nullable|max:40',
            'telefono_anexo' => 'nullable|max:10'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'direccion_principal.required' => 'Campo "Direccion Principal" es abligatorio.',
            'direccion_principal.max' => 'El campo "Direccion Principal" como máximo 200 caracteres.',
            'direccion_secundaria.max' => 'El campo "Direccion Secundaria" como máximo 200 caracteres.',
            'atencion.max' => 'El campo "Atencion" como máximo 200 caracteres.',
            'telefono.max' => 'El campo "Telefono" como máximo 40 caracteres.',
            'telefono_anexo.max' => 'El campo "Telefono Anexo" como máximo 10 caracteres.'
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
