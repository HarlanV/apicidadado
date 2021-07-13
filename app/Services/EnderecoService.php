<?php

namespace App\Services;

use App\Models\Cidadao;
use App\Models\Endereco;
use Illuminate\Support\Facades\Http;


class EnderecoService
{

    public function show($cpf)
    {
        return Cidadao::where('cpf', $cpf)->first()->enderecos;
    }

    public static function importAddres($cep)
    {
        $url = 'https://viacep.com.br/ws/' . $cep . '/' . 'json/';
        return Http::get($url)->json();
    }

    public function insertAdress($citizen, $data)
    {
        $adress = self::addressConfig($data);

        if ($adress === false) {

            return[
                'erro'=>true,
                'message'=> 'CEP não localizado. Confira o campo e tente novamente.'
            ];
        }

        $adress = $this->createEndereco($citizen, $adress);

        if (!$adress instanceof Endereco) {
            return[
                'erro'=>true,
                'message'=> 'Problemas na inserção do endereco. Aguarde um momemento e tente novamente.'
            ];
        }

        return $adress;
    }

    private function createEndereco($citizen, $data)
    {
        return $citizen->enderecos()->create(
            [
                'cep' => $data["cep"],
                'logradouro' => $data["logradouro"],
                'bairro' => $data["bairro"],
                'cidade' => $data["cidade"],
                'estado' => $data["estado"],
            ]
        );
    }

    public static function addressConfig($data)
    {
       
        if (!array_key_exists("cep", $data)) {
            return false;
        }
       
        $address = EnderecoService::importAddres($data["cep"]);
   
        if (array_key_exists("erro", $address)) {
            return false;
        } else {
            return [
                "cep" => $data["cep"],
                "logradouro" => $address["logradouro"],
                "bairro" => $address["bairro"],
                "cidade" => $address["localidade"],
                "estado" => $address["uf"],
            ];
        }
    }

    public function update($adress, $data)
    {        
        $newAddress = self::addressConfig($data);

        if ($newAddress === false) {
            return 'CEP não localizado. Confira o campo e tente novamente.';
        }

        $adress->fill($newAddress);

        $adress->save();

        return $adress;
    }

}
