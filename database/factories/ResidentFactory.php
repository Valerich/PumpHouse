<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fio' => $this->faker->lastName . ' ' . $this->faker->firstName,
            'area' => $this->faker->randomFloat(2, 20, 100),
            'start_date' => $this->faker->dateTimeBetween('-12 months')
        ];
    }
}
