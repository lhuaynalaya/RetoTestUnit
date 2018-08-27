<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCuenta extends FormRequest {

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
        'nombre' => 'required|max:200',
        'nombre_visualizacion' => 'required|max:200',
        'numero_documento' => 'max:20',
        'moneda_simbolo' => 'max:5',
        'cp_nombres' => 'required|max:200|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
        'cp_apellido_paterno' => 'nullable|max:50|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/',
        'cp_apellido_materno' => 'nullable|max:50|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/',
        'numero_documento' => 'unico:cuentas,numero_documento,' . $id . ',' . $organizacion_id,
      ];
      return $validators;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'numero_documento.documentounico' => 'El valor de este campo ya existe.',
            'nombre.required' => 'El campo "Nombre" es obligatorio.',
            'nombre.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'nombre_visualizacion.required' => 'El campo "Nombre Visualizacion" es obligatorio.',
            'nombre_visualizacion.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'numero_documento.required' => 'El campo "Numero Documento" es obligatorio.',
            'numero_documento.max' => 'El campo debe de tener un máximo de 20 caracteres.',
            'moneda_codigo.required' => 'El campo "Codigo de moneda" es obligatorio.',
            'moneda_codigo.max' => 'El campo "Codigo moneda" como máximo 5 caracteres.',
            'moneda_simbolo.required' => 'El campo "Simbolo de moneda" es obligatorio.',
            'moneda_simbolo.max' => 'El campo "Simbolo moneda" como máximo 5 caracteres.',
            'cp_nombres.required' => 'El campo "Nombre" es obligatorio.',
            'cp_nombres.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'cp_nombres.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'cp_apellido_paterno.required' => 'El campo "Apellido Paterno" es obligatorio.',
            'cp_apellido_paterno.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'cp_apellido_paterno.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'cp_apellido_materno.required' => 'El campo "Apellido Materno" es obligatorio.',
            'cp_apellido_materno.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'cp_apellido_materno.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'cp_telefono_anexo.required' => 'El campo "Telefono Anexo" es obligatorio.',
            'cp_telefono_anexo.max' => 'El campo debe de tener un máximo de 10 caracteres.',
            'cp_numero_documento.required' => 'El campo "Numero Documento" es obligatorio.',
            'cp_numero_documento.max' => 'El campo debe de tener un máximo de 20 caracteres.',
            'nombre_vendedor.required' => 'El campo "Nombre Vendedor" es obligatorio.',
            'nombre_vendedor.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'nombre_vendedor.regex' => 'El campo solo permite caracteres alfanúmericos.'
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
