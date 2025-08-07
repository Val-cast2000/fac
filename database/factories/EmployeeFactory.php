<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Factory;
use Illuminate\Database\Eloquent\Factories\Factory as BaseFactory;

class EmployeeFactory extends BaseFactory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'factory_id' => Factory::factory(), // ensure Factory also has a factory
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
