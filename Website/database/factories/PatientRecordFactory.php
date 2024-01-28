<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teeth_present' => fake()->numberBetween(20, 32),
            'caries_free_teeth' => fake()->numberBetween(0, 5),
            'teeth_for_extraction' => fake()->numberBetween(0, 5),
            'teeth_for_restoration' => fake()->numberBetween(0, 10),
            'missing_teeth' => fake()->numberBetween(0, 10),
            'filled_teeth' => fake()->numberBetween(0, 10),
            'total_dmft' => fake()->numberBetween(0, 32),
            'debris_tooth_stains' => fake()->randomElement(['none', 'trace', 'slight', 'moderate', 'heavy']),
            'calcular_deposits' => fake()->randomElement(['none', 'trace', 'slight', 'moderate', 'heavy']),
            'gingivitis' => fake()->randomElement(['none', 'trace', 'slight', 'moderate', 'heavy']),
            'periodontal_pocket' => fake()->numberBetween(0, 5),
            'orthodontic_treatment' => fake()->numberBetween(0, 5),

        ];
    }
}
