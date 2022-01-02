<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            'nome' => $faker->name,
            'cpf' => $faker->unique()->cpf,
            'email' => $faker->unique()->safeEmail(),
            'telefone' => sprintf('(0%s) %s', $faker->areaCode, $faker->landline),
            'endereco' => $faker->address
        ];
    }
}
