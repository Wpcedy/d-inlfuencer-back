<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class CampaignTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create_a_campaign()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/campaign', [
            "name" => "Campanha de Treinamento",
            "description" => "Descrição completa da Campanha de Treinamento",
            "budget" => 70000.50,
            "start_campaign" => "2024-11-27",
            "end_campaign" => "2024-12-27"
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('campaigns', [
            "name" => "Campanha de Treinamento",
            "description" => "Descrição completa da Campanha de Treinamento",
            "budget" => 70000.50,
            "start_campaign" => "2024-11-27",
            "end_campaign" => "2024-12-27"
        ]);
    }

    /** @test */
    public function cant_create_campaign()
    {
        $response = $this->post('/campaign', [
            "name" => "Campanha de Treinamento",
            "description" => "Descrição completa da Campanha de Treinamento",
            "budget" => 70000.50,
            "start_campaign" => "2024-11-27",
            "end_campaign" => "2024-12-27"
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    public function get_all_campaign()
    {
        Campaign::factory()->count(2)->create();

        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/campaign');

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'description',
                    'budget',
                    'start_campaign',
                    'end_campaign',
                ],
            ],
        ]);
    }
}
