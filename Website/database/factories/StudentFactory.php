<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'user_id' => User::factory(),
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'sex' => fake()->randomElement(['male', 'female']),
            'address' => fake()->address(),
            'contact_number' => fake()->numberBetween(639000000000, 639999999999),
            'civil_status' => fake()->randomElement(['single', 'married', 'divorced', 'widowed']),
            'school' => fake()->randomElement(['SAMCIS', 'SEA', 'STELA', 'SOL', 'SAS', 'SONAHBS']),
            'course' => fake()->randomElement(['BSIT', 'BSCE', 'BSN', 'BSCS', 'BSED', 'BSMMA', 'BSA', 'BSCE']),
            'year' => fake()->numberBetween(1, 5),
            'age' => fake()->numberBetween(19, 25),
            'birth_date' => fake()->date()
        ];
    }
}
