<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200)
         ->assertJsonStructure(['access_token', 'token_type', 'user']);
    }


    public function test_unauthorized_user_cannot_access_protected_routes()
    {
        $response = $this->getJson('/api/factories');
        $response->assertStatus(401);
    }
}
