<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreImpuesto extends FormRequest {

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
          'max:120',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
          'unico:impuestos,nombre,' . $id . ',' . $organizacion_id
        ),
        'porcentaje' => array(
          'required',
          'numeric',
          'between:0,100',
          'regex:/^(\d+(\.\d{1,2})?)?$/'
        ),
        'codigo' => array(
          'max:20',
          'required',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
          'unico:impuestos,codigo,' . $id . ',' . $organizacion_id
        ),
        'descripcion' => array(
          'max:6000',
          'nullable'
        )
      ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'nombre.required' => 'El campo es obligatorio.',
          'nombre.max' => 'El campo debe de tener un máximo de 120 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'nombre.unico' => 'El valor de este campo ya existe.',
          'porcentaje.required' => 'El campo es obligatorio.',
          'porcentaje.numeric' => 'Por favor asegurese que el valor sea válido.',
          'porcentaje.between' => 'Por favor asegurese que el valor sea válido.',
          'porcentaje.regex' => 'Por favor asegurese que el valor sea válido.',
          'codigo.required' => 'El campo es obligatorio.',
          'codigo.max' => 'El campo debe de tener un máximo de 20 caracteres.',
          'codigo.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'codigo.unico' => 'El valor de este campo ya existe.',
          'descripcion.max' => 'El campo debe de tener un máximo de 6000 caracteres.'
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
