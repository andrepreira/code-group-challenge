<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<50; $i++) {
            DB::table('clients')->insert([
                'nome' => $faker->name,
                'cpf' => $faker->unique()->cpf,
                'email' => $faker->unique()->safeEmail(),
                'telefone' => sprintf('(0%s) %s', $faker->areaCode, $faker->landline),
                'endereco' => $faker->address
            ]);
        }
    }
}
