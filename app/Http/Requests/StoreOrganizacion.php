<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrganizacion extends FormRequest {

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

        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El campo "Nombre" es obligatorio.',
            'nombre.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'nombre_portal.required' => 'El campo "Nombre Portal" es obligatorio.',
            'nombre_portal.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'nombre_portal.regex' => 'El campo solo permite caracteres alfanúmericos.',

            'nombre.unico' => 'El valor de este campo ya existe.',
            'nombre_portal.unico' => 'El valor de este campo ya existe.',

            'cp_nombres.required' => 'El campo "cp_nombres" es obligatorio.',
            'cp_nombres.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'cp_nombres.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'cp_correo_electronico.required' => 'El campo "Correo Electronico" es obligatorio.',
            'cp_correo_electronico.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'cp_correo_electronico.regex' => 'El formto de correo electronico es erroneo.',
            'codigo_idioma.required' => 'El campo "Codigo Idioma" es obligatorio.'
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
