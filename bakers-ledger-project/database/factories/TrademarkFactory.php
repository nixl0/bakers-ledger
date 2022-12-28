<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trademark>
 */
class TrademarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => ucfirst(fake()->unique()->words(2, true)),
            'company_id' => fake()->numberBetween(1, 2000),
            'grade_id' => fake()->numberBetween(1, 7),
            'ingredients' => implode(', ', fake()->words(12)),
            'weight' => fake()->numberBetween(50, 4000)
        ];
    }
}
