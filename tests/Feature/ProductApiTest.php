<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_create_product()
    {
        // Authenticate fake user
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        $payload = [
            'name' => 'Test Product',
            'price' => 100,
            'stock' => 10,
        ];

        $response = $this->postJson('/api/v1/product', $payload);

        $response->assertStatus(201)
        ->assertJson([
            'status' => 'success',
            'data' => [
                'name' => 'Test Product',
                'price' => '100.00',
                'stock' => 10,
            ]
        ]);
    }
}
