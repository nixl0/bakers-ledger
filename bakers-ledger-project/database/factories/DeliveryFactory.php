<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'shop_id' => fake()->numberBetween(1, 5000),
            'trademark_id' => fake()->numberBetween(1, 6000),
            'price' => fake()->numberBetween(1, 30) * 10,
            'quantity' => fake()->numberBetween(2, 10) * 10,
            'date' => fake('ru_RU')->dateTimeBetween('-20 years', '-2 years')
        ];
    }
}
