<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_number' => fake()->numberBetween(2000000, 2999999),
            'employee_type' => fake()->randomElement(['teaching','non_teaching']),
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'sex' => fake()->randomElement(['male', 'female']),
            'address' => fake()->address(),
            'contact_number'=> fake()->numberBetween(639000000000, 639999999999),
            'civil_status' => fake()->randomElement(['single', 'married', 'divorced', 'widowed']),
            'department' => fake()->jobTitle(),
            'year' => fake()->numberBetween(1, 4),
            'age' => fake()->numberBetween(19, 25),
            'birth_date' => fake()->date()
        ];
    }
}
