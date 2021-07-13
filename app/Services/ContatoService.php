<?php

namespace App\Services;

use App\Models\Cidadao;
use App\Models\Contato;

class ContatoService
{

    public function show($cpf)
    {
        $citizen = Cidadao::where('cpf', $cpf)->first();
        if (!$citizen instanceof Cidadao) {
            return "Dados não localizados.";
        }
        return $citizen->contatos;
    }

    public function createContacts($citizen, $contact)
    {

        $contato = $citizen->contatos()->create(
            [
                'email'=>$contact['email'],
                'celular'=> $contact['celular'],
            ]
        );


        if (!$contato instanceof Contato) {
            return[
                'erro'=>true,
                'message'=> 'Problemas na inserção do contato. Aguarde um momemento e tente novamente.'
            ];
        }

        return[
            'erro'=>false,
            'message'=> 'OK'
        ];
        return $contato;
    }


    public function update($contact, $data)
    {   
        $contact->fill($data);

        $contact->save();

        #dd($contact);
        return $contact;
    }


}
