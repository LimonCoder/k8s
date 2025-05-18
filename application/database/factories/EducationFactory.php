<?php

namespace Database\Factories;

use App\Models\Information;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'information_id' => Information::inRandomOrder()->first()->id,
            'campus_name' => $this->faker->company() . ' University',
            'degree' => $this->faker->randomElement(['BSc', 'MSc', 'PhD', 'Bachelor', 'Master']),
            'department' => $this->faker->randomElement(['Computer Science', 'Software Engineering', 'Information Technology', 'Data Science', 'Artificial Intelligence']),
            'passing_year' => $this->faker->numberBetween(2015, 2024),
        ];
    }
}
