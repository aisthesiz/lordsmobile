<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
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
            'user_id' => User::factory()->create()->id,
            'lord_account_id' => fake()->numberBetween(10000000),
            'params' => '{}',
            'is_active' => fake()->boolean(),
            'activated_at' => Carbon::now(),
            'deactivated_at' => Carbon::now(),
            'time_start' => Carbon::now(),
            'time_end' => Carbon::now()->addMonth(30),
        ];
    }
}
