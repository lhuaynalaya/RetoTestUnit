<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreCuentaSunat extends FormRequest {

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
        'nombre_comercial' => array(
          'max:200',
          'nullable',
          'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/'
        ),
        'tipo_contribuyente' => array(
          'max:200',
          'nullable',
          'regex:/^(\d+(\.\d{1,2})?)?$/'
        ),
        'fecha_inscripcion' => array(
          'max:200',
          'nullable'
        ),
        'direccion_domicilio_fiscal' => array(
          'max:200',
          'nullable',
          'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚ_.,-\/\n ]*$/'
        ),
        'sistema_emision_comprobante' => array(
          'max:50',
          'nullable',
          'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚ_.,-\/\n ]*$/'
        ),
        'actividad_exterior' => array(
          'max:100',
          'nullable',
          'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚ_.,-\/\n ]*$/'
        ),
        'sistema_contabilidad' => array(
          'max:200',
          'nullable',
          'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚ_.,-\/\n ]*$/'
        ),
        'oficio' => array(
          'max:200',
          'nullable',
          'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚ_.,-\/\n ]*$/'
        ),
        'actividad_economica' => array(
          'max:200',
          'nullable',
          'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚ_.,-\/\n ]*$/'
        ),
        'emision_electronica' => array(
          'max:200',
          'nullable',
          'regex: /^[a-zA-Z0-9áéíóúÁÉÍÓÚ_.,-\/\n ]*$/'
        )

        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'nombre_comercial.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'nombre_comercial.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'tipo_contribuyente.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'tipo_contribuyente.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'fecha_inscripcion.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'direccion_domicilio_fiscal.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'direccion_domicilio_fiscal.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'sistema_emision_comprobante.max' => 'El campo debe de tener un máximo de 50 caracteres.',
          'sistema_emision_comprobante.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'actividad_exterior.max' => 'El campo debe de tener un máximo de 100 caracteres.',
          'actividad_exterior.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'sistema_contabilidad.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'sistema_contabilidad.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'oficio.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'oficio.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'actividad_economica.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'actividad_economica.regex' => 'El campo solo permite caracteres alfanúmericos.',
          'emision_electronica.max' => 'El campo debe de tener un máximo de 200 caracteres.',
          'emision_electronica.regex' => 'El campo solo permite caracteres alfanúmericos.',
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
