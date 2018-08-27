<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCuentaComentario extends FormRequest {

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
            'descripcion' => array(
              'required',
              'max:250',
            ),
            'comentado_por' => array(
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
            ),
            'fecha_formato' => array(
              'regex:/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[012])[\/\-]\d{4}$/'
            ),
            'tiempo' => array(
              'max:255'
            ),
            'tipo_comentario' => array(
              'max:255'
            )           
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'descripcion.required' => 'El campo es obligatorio.',
          'descripcion.max' => 'El campo debe de tener un máximo de 250 caracteres.',
          'descripcion.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'cuenta_id.required' => 'El campo es obligatorio.',
          'comentado_por.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fecha_formato.regex' => 'El campo solo permite caracteres fechas.',
          'tiempo.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'tipo_comentario.max' => 'El campo debe de tener un máximo de 255 caracteres.'
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
