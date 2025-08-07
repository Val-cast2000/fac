<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Factory;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class FactoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Sanctum::actingAs(User::factory()->create());
    }

    public function test_can_create_factory()
    {
        $response = $this->postJson('/api/factories', [
            'factory_name' => 'Test Factory',
            'location' => 'Baguio City',
            'email' => 'factory@example.com',
            'website' => 'https://example.com',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('factories', ['factory_name' => 'Test Factory']);
    }

    public function test_can_update_factory()
    {
        $factory = Factory::factory()->create();

        $response = $this->putJson("/api/factories/{$factory->id}", [
            'factory_name' => 'Updated Name',
            'location' => 'New Location',
            'email' => 'new@example.com',
            'website' => 'https://new.com',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('factories', ['factory_name' => 'Updated Name']);
    }

    public function test_can_delete_factory()
    {
        $factory = Factory::factory()->create();

        $response = $this->deleteJson("/api/factories/{$factory->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('factories', ['id' => $factory->id]);
    }
}