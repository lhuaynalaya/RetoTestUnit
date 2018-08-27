<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreComision extends FormRequest {

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
          'max:250',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
          'unico:comisiones,nombre,' . $id . ',' . $organizacion_id
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
          'nombre.required' => 'El campo es obligatorio.',
          'nombre.unico' => 'El valor de este campo ya existe.',
          'nombre.max' => 'El campo debe de tener un máximo de 250 caracteres.',
          'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'organizacion_id.required' => 'El campo es obligatorio.',
          'producto_id.required' => 'El campo es obligatorio.',
          'valor.regex' => 'El campo solo permite caracteres decimales',
          'valor_formato.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'tipo.max' => 'El campo debe de tener un máximo de 255 caracteres.',
          'sku.max' => 'El campo debe de tener un máximo de 255 caracteres.'
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
