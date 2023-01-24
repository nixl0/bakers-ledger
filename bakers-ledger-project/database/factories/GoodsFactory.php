<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goods>
 */
class GoodsFactory extends Factory
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
            'delivery_id' => fake()->numberBetween(1, 10000),
            'trademark_id' => fake()->numberBetween(1, 6000),
            'quantity' => fake()->numberBetween(2, 10) * 10,
        ];
    }
}
