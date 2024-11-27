<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_register()
    {
        $response = $this->post('/user', [
            "name" => "Willian Pires",
            "email" => "willianp.developer@gmail.com",
            "password" => "teste123"
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            "name" => "Willian Pires",
            "email" => "willianp.developer@gmail.com",
            "password" => "teste123"
        ]);
    }

    /** @test */
    public function login_a_user()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            "email" => $user->email,
            "password" => $user->password
        ]);

        $response->assertStatus(200);
        $response->assertJson(['token' => true]);
    }
}
