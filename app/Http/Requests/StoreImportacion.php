<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreImportacion extends FormRequest {

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
            'nombre_archivo' => 'nullable|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El código de organizacion_id es obligatorio.',
            'entidad.required' => 'El campo es obligatorio.',
            'entidad.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'entidad.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'nombre_archivo.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'nombre_archivo.regex' => 'El campo solo permite caracteres alfanúmericos.'
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
