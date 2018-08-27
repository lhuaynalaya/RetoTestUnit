<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreVendedor extends FormRequest {

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

      return [
        'nombres' => array(
          'required',
          'max:200',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'apellido_paterno' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'apellido_materno' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'correo_electronico' => array(
            'required',
            'max:200',
            'regex:/^((([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})))*$/',
            'unique:vendedores,correo_electronico,' . $id
        )
      ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'nombres.required' => 'El campo es obligatorio.',
          'nombres.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'nombres.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'apellido_paterno.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'apellido_paterno.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'apellido_materno.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'apellido_materno.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'correo_electronico.required' => 'El campo es obligatorio.',
          'correo_electronico.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'correo_electronico.regex' => 'El valor de este campo no es válido.',
          'correo_electronico.unique' => 'El valor de este campo ya existe.'
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
