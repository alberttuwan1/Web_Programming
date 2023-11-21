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

        $majors = [
            'Computer Science and Mathematics',
            'Computer Science',
            'Data Science',
            'Visual Communication Design',
            'Interior Design',
            'Film',
        ];

        $major = $this->faker->randomElement($majors);
        $faculty = 'School of Computer Science';
        
        if(in_array($major, ['Visual Communication Design','Interior Design','Film'])){
            $faculty = 'School of Design';
        }

        return [

            'name' => $this->faker->name(),
            'major' => $major,
            'faculty' => $faculty,
            'DOB' => $this->faker->dateTimeBetween('-22 years', '-20 years'),
            'GPA' => $this->faker->randomFloat(2, 1, 4)
        ];
    }
}
