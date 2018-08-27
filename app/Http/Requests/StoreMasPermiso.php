<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMasPermiso extends FormRequest {

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
            'nombre' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
            'nombre_formato' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El código de organizacion_id es obligatorio.',
            'nombre.required' => 'El campo es obligatorio.',
            'nombre.max' => 'El campo debe de tener un máximo de 255 caracteres.'
            'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'nombre_formato.required' => 'El campo es obligatorio.',
            'nombre_formato.max' => 'El campo debe de tener un máximo de 255 caracteres.'
            'nombre_formato.regex' => 'El campo solo permite caracteres alfanúmericos.',
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
