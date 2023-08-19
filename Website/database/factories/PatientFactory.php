<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->numberBetween(2000000, 2999999),
            'pat_type' => fake()->randomElement(['student', 'employee']),
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'birth_date' => fake()->date(),
            'address' => fake()->address(),
            'sex' => fake()->randomElement(['male', 'female', 'others']),
            'civil_status' => fake()->randomElement(['single', 'married', 'divorced', 'widowed']),
        ];
    }
}
