<?php

namespace App\Services;

use App\Models\Cidadao;
use App\Models\Contato;

class ContatoService
{

    public function show($cpf)
    {
        return Cidadao::where('cpf', $cpf)->first()->contatos;
    }

    public function createContacts($citizen, $contact)
    {

        $contato = $citizen->contatos()->create(
            [
                'email'=>$contact['email'],
                'celular'=> $$contact['celular'],
            ]
        );

        if (!$contato instanceof Contato) {
            return "Confira suas informações de contato";
        }

        return $contato;
    }


    public function update($citizen, $data)
    {        
        $citizen->contatos()->fill($data);

        $citizen->save();

        return $citizen;
    }


}
