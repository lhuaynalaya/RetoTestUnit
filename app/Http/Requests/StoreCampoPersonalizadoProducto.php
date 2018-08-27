<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCampoPersonalizadoProducto extends FormRequest {

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
            'valor_formateado' => 'max:255',
            'tipo_dato' => 'required|max:255',
            'etiqueta' => 'required|max:255',
            'placeholder' => 'max:255',
            'valor' => 'max:255'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'valor_formateado.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'tipo_dato.required' => 'El campo es obligatorio.',
            'tipo_dato.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'etiqueta.required' => 'El campo es obligatorio.',
            'etiqueta.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'placeholder.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'valor.max' => 'El campo debe de tener un máximo de 255 caracteres.',
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
