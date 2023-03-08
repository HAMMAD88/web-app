<?php

namespace Database\Factories;

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
            //
            "name" =>fake()->name(),
            "dept_id"=>\App\Models\Department::inRandomOrder()->first()->id,
            "course_id"=>\App\Models\Course::inRandomOrder()->first()->id
            
        ];
    }
}