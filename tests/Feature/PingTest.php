<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ping_route_is_working()
    {
        $response = $this->get('/ping');

        $response->assertStatus(200);
        $response->assertSee('Backend is working');
    }
}
