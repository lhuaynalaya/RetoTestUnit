<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreComisionItem extends FormRequest {

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
        'codigo_moneda' => 'max:10|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
        'nombre' => 'max:250|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
        'valor' => 'redex:^[1-9]\d*(,\d+)?$',
        'valor_formato' => 'max:250|regex',
        'tipo' => 'max:255',
        'meta' => 'nullable|numeric',
        'sku' => 'max:255'
      ];
    }

    /**
     * @return array
     */
    public function messages()
    {
      return [
        'organizacion_id.required' => 'El código de organizacion_id es obligatorio.',
        'codigo_moneda.max' => 'Cantidad maxima de 10 caracteres.',
        'codigo_moneda.regex' => 'Formato no valido.',
        'nombre.max' => 'Cantidad maxima de 250 caracteres.',
        'nombre.regex' => 'Formato de nombre no valido.',
        'valor.regex' => 'Formato de valor no valido.',
        'valor_formato.max' => 'Cantidad maxima de 250 caracteres.',
        'valor_formato.regex' => 'Formato de nombre no valido.',
        'meta.numeric' => 'Campo no válido.'
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
