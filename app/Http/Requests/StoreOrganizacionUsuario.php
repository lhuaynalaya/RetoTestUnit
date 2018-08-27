<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrganizacionUsuario extends FormRequest {

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
            'organizacion_id' => 'required',
            'nombre' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
            'email' => array(
              'nullable',
              'max:255',
                'regex:/^((([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})))*$/',
            ),
            'codigo_vendedor' => array(
                'unico:organizacion_usuarios,codigo_vendedor,' . $id . ',' . $organizacion_id
            )
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El campo "organizacion_id" es obligatorio.',
            'nombre.required' => 'El campo "Nombre" es obligatorio.',
            'nombre.max' => 'El campo "Nombre" como máximo 20 caracteres.',
            'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'email.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'email.regex' => 'El valor de este campo no es válido.',
            'codigo_vendedor.unico' => 'El valor de este campo ya existe.'
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
