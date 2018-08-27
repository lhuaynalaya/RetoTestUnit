<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest {

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
        
        $validators = [
        'title' => 'required|max:2|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/',
        ];
        return $validators;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'El campo "title" es obligatorio.',
            'title.max' => 'El campo debe de tener un máximo de 1 caracteres.',
            'title.regex' => 'El campo solo permite caracteres alfanúmericos.',
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
