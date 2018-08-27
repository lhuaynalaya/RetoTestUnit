<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreGiroNegocio extends FormRequest {

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
        'nombre' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ_. ]/',
        'ciiu' => 'required|max:255|regex:/^[1-9]/',
        'organizacion_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'nombre.required' => 'El campo "Nombre de Giro de Negocio" es obligatorio.',
          'nombre.max' => 'El campo "Nombre de Giro de Negocio" como máximo 20 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'ciiu.required' => 'El campo "ciiu de Ciro de Negocio" es obligatorio.',
          'ciiu.max' => 'El campo "ciiu de Ciro de Negocio" como máximo 20 caracteres.',
          'ciiu.regex' => 'El campo solo permite numero del 0-9.',
          'organizacion_id' => 'El campo "organizacion_id" es obligatorio.'
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
