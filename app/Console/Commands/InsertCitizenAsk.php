<?php

namespace App\Console\Commands;

use App\Services\CidadaoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class InsertCitizenAsk extends Command
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
    protected $signature = 'cidadao:create-asking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere um novo cidadao dinamicamente';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Nome:');
        $surname = $this->ask('Sobrenome:');
        $cpf = $this->ask('CPF (apenas digitos):');
        $email = $this->ask('Email:');
        $phone = $this->ask('Celular (com ddd, apenas numeros):');
        $cep = $this->ask('CEP:');

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
        }

    }
    
}
