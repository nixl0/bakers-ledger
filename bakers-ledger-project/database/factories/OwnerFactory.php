<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = [fake('ru_RU')->lastName(), fake('ru_RU')->firstName(), fake('ru_RU')->firstName()];

        return [
            'lastname' => $names[0],
            'firstname' => $names[1],
            'patronym' => $names[2]
        ];
    }
}
