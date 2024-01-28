<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DentalExamination>
 */
class DentalExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id'=> Student::factory(),
            'debris_tooth_stain' => fake()->randomElement(['none', 'trace', 'slight', 'moderate', 'heavy']),
            'calcular_deposits' => fake()->randomElement(['none', 'trace', 'slight', 'moderate', 'heavy']),
            'gingivitis' => fake()->randomElement(['none', 'trace', 'slight', 'moderate', 'heavy']),
            'periodontal_pocket' => fake()->numberBetween(0,1),
            'orthodontic_treatment' => fake()->numberBetween(0,1),
        ];
    }
}
