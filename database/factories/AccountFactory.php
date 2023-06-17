<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => fake()->userName(),
            'user_id' => User::first()->id,
            'lord_account_id' => fake()->numberBetween(10000000),
            'params' => '{}',
            'is_active' => fake()->boolean(),
            'params_updated_at' => now(),
            'params_readed_at' => now(),
            'params_wrote_at' => now(),
            'time_start' => now(),
            'time_end' => now()->addMonth(),
        ];
    }
}
