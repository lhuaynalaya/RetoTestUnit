<?php namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreListaPrecio extends FormRequest {

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

      $validators = [
        'nombre' => array(
          'required',
          'max:250',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_.\-\(\) ]*$/',
          'unico:lista_precios,nombre,' . $id . ',' . $organizacion_id
        ),
        'organizacion_id' => array(
          'required'
        ),
        'porcentaje' => array(
          'nullable',
          'regex:/^[1-9]\d*(\.\d+)?$/'
        ),
        'descripcion' => array(
          'max:200',
          'nullable'
        )
      ];

        return $validators;
    }

    /**
     * @return array
     */
    public function messages()
    {
      return [
        'nombre.required' => 'El campo es obligatorio.',
        'nombre.max' => 'El campo debe de tener un máximo de 250 caracteres.',
        'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
        'nombre.unico' => 'El valor de este campo ya existe.',
        'organizacion_id.required' => 'El campo es obligatorio.',

        'organizacion_id.required' => 'El campo "organizacion_id" es obligatorio.',
        'porcentaje.redex' => 'Formato no valido para porcentaje',
        'descripcion.max' => 'El campo "Descripcion" como máximo 200 caracteres.'
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
