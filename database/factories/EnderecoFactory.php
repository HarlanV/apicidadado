<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cep' => $this->faker->name(),
            'logradouro' => $this->faker->name(),
            'complemento' => $this->faker->cpf,
            'bairro' => $this->faker->cpf,
            'cidade' => $this->faker->cpf,
            'estado' => $this->faker->cpf,
            'cidade' => $this->faker->cpf
        ];
    }
}
