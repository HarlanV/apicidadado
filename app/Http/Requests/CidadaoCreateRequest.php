<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CidadaoCreateRequest extends FormRequest
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
            'nome' => 'required|min:2',
            'sobrenome' => 'required',
            'cpf' => 'required|unique:App\Models\Cidadao,cpf',
            'contatos' => 'required',
            'contatos.email' => 'required|unique:App\Models\Contato,contato',
            'contatos.celular' => 'required|max:12|min:9',
            'cep' => 'required|min:8|max:8',
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
            'required' => 'Os campos :attribute é obrigatório.',
            'nome.min' => 'O nome deve ser preenchido com um valor valido (Min 2 caracter)',
            'sobrenome.min' => 'O sobrenome deve ser preenchido com um valor valido (Min 2 caracter)',
            'cpf.unique' => 'CPF já cadatrado. Por favor, confira os dados ou entre em contato conosco',
            'cep.min' => 'Confira se o CEP está correto',
            'cep.max' => 'Confira se o CEP está correto',
            'uf.min' => 'Confira a unidade federativa(Min 1)',
            'uf.max' => 'Confira a unidade federativa(Max 2)',
            'celular.min' => 'Confira se celular para contato está correto',
            'celular.max' => 'Confira se celular para contato está correto',
            'email.unique' => 'Email já foi cadatrado. Por favor, confira os dados ou entre em contato conosco',
        ];
    }
}
