<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidadao;
use App\Models\Contato;
use App\Models\Endereco;

class CidadaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidadao = Cidadao::create([
            'cpf'=>'12345678900',
            'nome'=>'Harlan Victor',
            'sobrenome' =>'Costa Magalhães'
        ]);

        $cidadao->contatos()->create([
            "email"=> "harlan@gmail.com",
            "celular"=> "999990000"

        ]);

        $cidadao->enderecos()->create([
            "cep"=>"58429795",
            "logradouro"=> "58429795",
            "bairro"=> "58429795",
            "cidade"=> "58429795",
            "estado"=> "PB"
        ]);
    }
}
