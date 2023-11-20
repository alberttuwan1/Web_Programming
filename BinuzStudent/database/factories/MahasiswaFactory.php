<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name(),
            'major' => $this->faker->randomElement(['Computer Science and Mathematics', 'Computer Science', 'Data Science']),
            'faculty' => 'SOCS',
            'DOB' => $this->faker->dateTimeBetween('-22 years', '-20 years'),
            'GPA' => $this->faker->randomFloat(2, 1, 4)
        ];
    }
}
