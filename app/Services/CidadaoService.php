<?php

namespace App\Services;

use App\Models\Cidadao;
use App\Services\ContatoService;
use App\Services\EnderecoService;

use Illuminate\Support\Facades\DB;

class CidadaoService
{

    public function show($cpf)
    {
        return Cidadao::where('cpf', $cpf)->first();
    }

    public function create($data)
    {
     
        DB::beginTransaction();

        $citizen = $this->insertCitizen($data);

        if (!$citizen instanceof Cidadao) {
            DB::rollBack();
            return false;
        }

        $service = new ContatoService;

        $contact = $service->createContacts($citizen, $data["contatos"]);
        if ($contact["erro"] === true) {
            DB::rollBack();
            return $contact["message"];
        }

        $service = new EnderecoService;

        $address = $service->insertAdress($citizen, $data);

        if ($address["erro"] === true) {
            DB::rollBack();
            return $address["message"];
        }

        DB::commit();

        return $citizen;
    }

    private function insertCitizen($data)
    {
        return Cidadao::create(
            [
                'nome' => $data["nome"],
                'sobrenome' => $data["sobrenome"],
                'cpf' => $data["cpf"],
            ]
        );
    }

    public function update($citizen, $data)
    {        
        $address = $this->EnderecoService::addressConfig($data);

        if (!$address === false) {
            $data["endereco"] = $address;
        }

        $citizen->fill($data);

        $citizen->save();

        return $citizen;
    }

  
}
