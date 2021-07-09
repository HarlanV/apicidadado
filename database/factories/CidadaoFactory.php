<?php

namespace Database\Factories;

use App\Models\Cidadao;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cidadao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'sobrenome' => $this->faker->name(),
            'cpf' => $this->faker->cpf,
        ];
    }
}
