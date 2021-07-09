<?php

namespace Database\Factories;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (random_int(0, 1) == 1) {
            return [
                'type' => 'email',
                'contact' => $this->faker->unique()->safeEmail
            ];
        } else {
            return [
                'type' => 'phone',
                'contact' => $this->faker->phoneNumber()
            ];
        }
    }
}
