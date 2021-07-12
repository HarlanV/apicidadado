<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CidadaoEditRequest extends FormRequest
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
            'nome' => 'nullable|min:2',
            'sobrenome' => 'nullable|min:2',
            'cpf' => 'nullable|unique:App\Models\Cidadao,cpf',
        ];
    }
}
