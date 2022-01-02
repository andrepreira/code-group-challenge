<?php

namespace Tests\Feature;

use App\Models\Client;
use Tests\TestCase;

class ClientTest extends TestCase
{

    /**
     * @test
     */
    public function create_a_client()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $newClient = [
            'nome' => $faker->name,
            'cpf' => $faker->unique()->cpf,
            'email' => $faker->unique()->safeEmail(),
            'telefone' => sprintf('(0%s) %s', $faker->areaCode, $faker->landline),
            'endereco' => $faker->address

        ];
        $response = $this->json('POST', '/api/client',$newClient);
        $response->assertStatus(200);
        $response->assertJson(  ['message' => 'Client Created Successfully!!']);
        $response->assertJson(['client' => $newClient]);
    }


    /**
     * @test
     */
    public function update_a_client()
    {
            $client = Client::factory()->create();
            $update    = $this->json('PATCH', '/api/client/'.$client->id);
            $update->assertStatus(200);
            $update->assertJson(['message' => 'Client Updated Successfully!!']);
    }

    /**
     * @test
     */
    public function delete_a_client()
    {
        $client = Client::factory()->create();

        $delete = $this->json('DELETE', '/api/client/'.$client->id);

        $delete->assertStatus(200);
        $delete->assertJson(['message' => 'Client Deleted Successfully!!']);
    }
}
