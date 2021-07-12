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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contatos' => 'required',
            'contatos.email' => 'nullable|unique:App\Models\Contato,contato',
            'contatos.celular' => 'nullable|max:12|min:9',
        ];
    }
}
