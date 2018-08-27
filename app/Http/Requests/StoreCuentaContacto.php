<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCuentaContacto extends FormRequest {

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
            'nombres' => array(
              'required',
              'max:200',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/'
            ),
            'apellido_paterno' => array(
              'required',
              'max:50',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/'
            ),
            'apellido_materno' => array(
              'required',
              'max:50',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/'
            ),
            'celular' => array(
              'required',
              'max:20'
              //'regex:/^[9|6|7][0-9]{8}$/'
            ),
            'correo_electronico' =>  array(
              'required',
              'max:200',
              'regex:/^((([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})))*$/'
            ),
            'numero_documento' => array(
              'nullable',
              'max:20'
            ),
            'telefono_trabajo' => array(
              'nullable',
              'max:20',
              'regex:/^[0-9]*$/'
            ),
            'departamento' => array(
              'nullable',
              'max:100',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/'
            ),
            'puesto_laboral' => array(
              'nullable',
              'max:100',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/'
            ),
            'skype' => array(
              'nullable',
              'max:100',
              'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_. ]*$/'
            ),
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'nombres.required' => 'El campo "Nombre" es obligatorio.',
            'nombres.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'nombres.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'apellido_paterno.required' => 'El campo "Nombre" es obligatorio.',
            'apellido_paterno.max' => 'El campo debe de tener un máximo de 50 caracteres.',
            'apellido_paterno.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'apellido_materno.required' => 'El campo "Nombre" es obligatorio.',
            'apellido_materno.max' => 'El campo debe de tener un máximo de 50 caracteres.',
            'apellido_materno.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'celular.required' => 'El campo "Celular" es obligatorio.',
            'celular.max' => 'El campo debe de tener un máximo de 20 caracteres.',
            'celular.regex' => 'El campo tiene caracteres erroneos.',
            'correo_electronico.required' => 'El campo "Correo Electronico" es obligatorio.',
            'correo_electronico.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'correo_electronico.regex' => 'El formto de correo electronico es erroneo.',
            'numero_documento.max' => 'El campo debe de tener un máximo de 20 caracteres.',
            'telefono_trabajo.max' => 'El campo debe de tener un máximo de 20 caracteres.',
            'telefono_trabajo.regex' => 'El campo tiene caracteres erroneos.',
            'departamento.max' => 'El campo debe de tener un máximo de 100 caracteres.',
            'departamento.regex' => 'El campo tiene caracteres erroneos.',
            'puesto_laboral.max' => 'El campo debe de tener un máximo de 100 caracteres.',
            'puesto_laboral.regex' => 'El campo tiene caracteres erroneos.',
            'skype.max' => 'El campo debe de tener un máximo de 100 caracteres.',
            'skype.regex' => 'El campo tiene caracteres erroneos.'
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
