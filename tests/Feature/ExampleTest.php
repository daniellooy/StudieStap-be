<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    // create a test for the user show route
    public function test_the_user_show_route_returns_a_successful_response()
    {
        // make a assertion that the user show route returns a successful response

        $this->json('GET', '/api/user/1')
            ->assertStatus(200);
    }

    // create a test for the user update route
    public function test_the_user_update_route_returns_a_successful_response()
    {
        $this->json('PUT', '/api/user', ['id' => 1])
            ->assertStatus(200);
    }
}
