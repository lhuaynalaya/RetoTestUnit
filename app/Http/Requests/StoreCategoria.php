<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreCategoria extends FormRequest {

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
        'nombre' => 'required|max:200|unico:categorias,nombre,' . $id . ',' . $organizacion_id,
        'descripcion' => 'max:300'
      ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'organizacion_id.required' => 'El código de organizacion es obligatorio.',
          'nombre.required' => 'El campo "Nombre de categoría" es obligatorio.',
          'nombre.max' => 'El campo "Nombre de categoría" como máximo 200 caracteres.',
          'nombre.unico' => 'El campo "Nombre de categoría" ya existe.',
          'descripcion.max' => 'El campo "Descripción" como máximo 300 carateres.'
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
