<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomSymbols = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Э', 'Ю', 'Я', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return [
            'number' => implode('', fake()->randomElements($randomSymbols, 16)),
            'title' => ucfirst(fake()->unique()->words(2, true)),
            'district_id' => fake()->numberBetween(1, 8000),
            'legal_id' => fake()->numberBetween(1, 7),
            'since' => fake()->numberBetween(1970, 2020),
            'email' => fake()->email(),
            'phone' => fake('ru_RU')->phoneNumber()
        ];
    }
}
