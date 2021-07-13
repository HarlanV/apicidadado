<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoEditRequest extends FormRequest
{
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
            'email' => 'sometimes|unique:App\Models\Contato,email',
            'celular' => 'nullable|max:12|min:9'
        ];
    }


    /**
     * Get the messages
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'celular.min' => 'Confira se celular para contato está correto',
            'celular.max' => 'Confira se celular para contato está correto',
            'email.unique' => 'Email já foi cadatrado. Por favor, confira os dados ou entre em contato conosco',
        ];
    }

}
