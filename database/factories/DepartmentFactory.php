<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
// when installed via composer
 require_once 'vendor/autoload.php';
class DepartmentFactory extends Factory
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
            "name" =>fake()->randomElement(['DS','BIO','AI','PSY','MATH']),
            "location"=>fake()->countryCode(),
        ];
    }
}
