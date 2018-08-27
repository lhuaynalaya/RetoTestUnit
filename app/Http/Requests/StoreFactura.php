<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreFactura extends FormRequest {

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
            'cliente_id'  => 'required',
            'canal_id' => 'required',
            'tipo_comprobante_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El código de organizacion_id es obligatorio.',
            'nombre_cliente.required' => 'El campo es obligatorio.',
            'nombre_cliente.max' => 'El campo debe de tener un máximo de 620 caracteres.',
            'nombre_cliente.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'canal_id.required' => 'El campo es obligatorio',
            'tipo_comprobante_id.required' => 'El campo es obligatorio'
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