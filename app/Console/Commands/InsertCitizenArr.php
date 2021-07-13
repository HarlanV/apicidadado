<?php

namespace App\Console\Commands;

use App\Services\CidadaoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class InsertCitizenArr extends Command
{
    private $validacaoCidadao = [
        'nome' => ['required', 'min:2'],
        'sobrenome' => ['required'],
        'cpf' => ['required', 'unique:App\Models\Cidadao,cpf'],
        'email' => ['required', 'unique:App\Models\Contato', 'contato'],
        'celular' => ['required', 'max:12', 'min:9'],
        'cep' => ['required', 'min:8', 'max:8'],
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cidadao:create-fast
                                {nome : Nome do cidadao} 
                                {sobrenome : Sobrenome do Cidadao} 
                                {cpf : CPF com apenas os digitos} 
                                {email : email para contato} 
                                {celular : telefone celular completo com apenas os digitos}
                                {cep : cep do endereco}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um novo cidadao inserindo todos os dados de uma vez';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('nome');
        $surname =$this->argument('sobrenome');
        $cpf = $this->argument('cpf');
        $email = $this->argument('email');
        $phone = $this->argument('celular');
        $cep = $this->argument('cep');

        $validator = Validator::make([
            'nome' => $name,
            'sobrenome' => $surname,
            'cpf' => $cpf,
            'contatos' => $email,
            'celular' => $phone,
            'cep' => $cep

        ], $this->validacaoCidadao);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 0;
        } else {

            $data = [
                'nome' => $name,
                'sobrenome' => $surname,
                'cpf' => $cpf,
                'contatos' => [
                    'contatos' => $email,
                    'celular' => $phone
                ],
                'cep' => $cep
            ];

            $service = new CidadaoService;

            $citizen = $service->create($data);

            $this->info($citizen->nome."inserido com sucesso");
            return 1;
        }

    }
}
