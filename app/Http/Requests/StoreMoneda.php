<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMoneda extends FormRequest {

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

      $id = '';
      if ($this->segments() !== null && count($this->segments()) > 0) {
        $id = $this->segments()[count($this->segments()) - 1];
      }

      $organizacion_id = $this->input('organizacion_id');

        return [
          'nombre' => array(
            'required',
            'max:20',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
            'unico:monedas,nombre,' . $id . ',' . $organizacion_id
          ),
          'codigo' => array(
            'required',
            'max:5',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
            'unico:monedas,codigo,' . $id . ',' . $organizacion_id
          ),
          'codigo_pais' => array(
            'required',
            'max:255',
            'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
          ),
          'simbolo' => array(
            'required',
            'max:5'
          ),
          'simbolo' => array(
            'required',
            'max:5'
          ),
          'organizacion_id' => array(
            'required'
          )
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'nombre.required' => 'El campo "Nombre de moneda" es obligatorio.',
          'nombre.max' => 'El campo "Nombre de moneda" como máximo 20 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',

          'nombre.unico' => 'El valor de este campo ya existe.',
          'codigo_pais.unico' => 'El valor de este campo ya existe.',

          'codigo.required' => 'El campo "Codigo de moneda" es obligatorio.',
          'codigo.max' => 'El campo "Codigo de moneda" como máximo 2 caracteres.',
          'codigo.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'codigo_pais.required' => 'El campo "Codigo de Pais" es obligatorio.',
          'codigo_pais.max' => 'El campo "Codigo de Pais" como máximo 255 caracteres.',
          'codigo_pais.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'simbolo.required' => 'El campo "Simbolo de moneda" es obligatorio.',
          'simbolo.max' => 'El campo "Simbolo moneda" como máximo 5 caracteres.',
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
