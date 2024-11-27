<?php

namespace Tests\Feature;

use App\Models\Influencer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class InfluencerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create_a_influencer()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/influencer', [
            "name" => "Willian Pires",
            "instagram" => "willpdc",
            "followers" => 500,
            "category" => "tecnologia"
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('influencers', [
            "name" => "Willian Pires",
            "instagram" => "willpdc",
            "followers" => 500,
            "category" => "tecnologia"
        ]);
    }

    /** @test */
    public function cant_create_influencer()
    {
        $response = $this->post('/influencer', [
            "name" => "Willian Pires",
            "instagram" => "willpdc",
            "followers" => 500,
            "category" => "tecnologia"
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    public function get_all_influencer()
    {
        Influencer::factory()->count(2)->create();

        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/influencer');

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'instagram',
                    'followers',
                    'category',
                ],
            ],
        ]);
    }
}
