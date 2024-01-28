<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalHistory>
 */
class MedicalHistoryFactory extends Factory
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
            'allergies' => fake()->randomElement(['Food Allergy', 'Pet Allergy', 'Pollen Allergy', 'Latex Allergy', 'Drug Allergy', 'Mold Allergy', 'none']),
            'diabetes' => fake()->randomElement(['Type 1', 'Type 2', 'Gestational', 'none']),
            'blood_dyscrasia' => fake()->randomElement(['Anemia', 'Blood Clots', 'Myeloma', 'lymphoma', 'hemophilia', 'none']),
            'cns_disorder' => fake()->randomElement(['Carpal Tunnel Syndrome', 'Peripheral Neuropathy', 'Guillain-Barre Syndrome', 'none']),
            'cardiovascular_disease' => fake()->randomElement(['Congenital Heart Disease', 'Coronary Heart Disease', 'Aorta Disease', 'none']),
            'tooth_related_surgery' => fake()->text('none'),
            'other_condition' => fake()->text('none'),
        ];
    }
}
