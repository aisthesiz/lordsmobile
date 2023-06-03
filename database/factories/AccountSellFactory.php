<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountSell>
 */
class AccountSellFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'        => fake()->text(),
            'might'        => fake()->numberBetween(10000000000),
            'id'           => fake()->uuid(),
            'image_1'      => fake()->image(dir: storage_path()),
            'image_2'      => fake()->image(dir: storage_path()),
            'image_3'      => fake()->image(dir: storage_path()),
            'image_4'      => fake()->image(dir: storage_path()),
            'image_5'      => fake()->image(dir: storage_path()),
            'image_6'      => fake()->image(dir: storage_path()),
            'stats_bow'    => fake()->numberBetween(1, 999),
            'stats_sword'  => fake()->numberBetween(1, 999),
            'stats_horse'  => fake()->numberBetween(1, 999),
            'heroes_payed' => fake()->numberBetween(1, 99),
            'heroes_free'  => fake()->numberBetween(1, 99),
            'artifacts'    => fake()->numberBetween(1, 99),
            'skins'        => fake()->numberBetween(1, 99),
            'troops'       => fake()->numberBetween(1, 99),
            'description'  => fake()->text(600),
        ];
    }
}
