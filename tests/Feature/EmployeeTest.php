<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Employee;
use App\Models\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Sanctum::actingAs(User::factory()->create());
    }

    public function test_can_create_employee()
    {
        $factory = Factory::factory()->create();

        $response = $this->postJson('/api/employees', [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'factory_id' => $factory->id,
            'email' => 'john@example.com',
            'phone' => '09123456789',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('employees', ['firstname' => 'John']);
    }

    public function test_can_update_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->putJson("/api/employees/{$employee->id}", [
            'firstname' => 'Jane',
            'lastname' => $employee->lastname,
            'factory_id' => $employee->factory_id,
            'email' => 'jane@example.com',
            'phone' => '09998887777',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('employees', ['firstname' => 'Jane']);
    }

    public function test_can_delete_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->deleteJson("/api/employees/{$employee->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    }
}