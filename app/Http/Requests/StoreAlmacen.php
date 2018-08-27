<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAlmacen extends FormRequest {

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
            'organizacion_id' => 'required',
            'nombre' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
            'correo_electronico' => array(
            'nullable',
            'max:200',
            'regex:/^((([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})))*$/'
            ),            
            'direccion_principal' => 'required|max:200',
            'direccion_secundaria' => 'nullable|max:200',
            'telefono' => 'nullable|max:40|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'telefono_anexo' => 'nullable|max:10',
            'atencion' => 'nullable|max:200'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'organizacion_id.required' => 'El código de organizacion_id es obligatorio.',
            'nombre.required' => 'El campo es obligatorio.',
            'nombre.max' => 'El campo debe de tener un máximo de 255 caracteres.',
            'nombre.regex' => 'El campo solo permite caracteres alfanúmericos.',
            'correo_electronico.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'correo_electronico.regex' => 'El valor de este campo no es válido.',
            'direccion_principal.required' => 'El campo es obligatorio.',
            'direccion_principal.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'direccion_secundaria.max' => 'El campo debe de tener un máximo de 200 caracteres.',
            'telefono.max' => 'El campo debe de tener un máximo de 40 caracteres.',
            'telefono.regex' => 'Formato no valido',
            'telefono_anexo.max' => 'El campo debe de tener un máximo de 10 caracteres.',
            'atencion.max' => 'El campo debe tener un máximo de 200 caracteres'
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
