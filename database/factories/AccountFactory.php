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
        $params = json_decode(file_get_contents(storage_path('configs/settings.json')), false);

        return [
            'id' => Str::uuid(),
            'name' => fake()->userName(),
            'user_id' => User::factory()->create()->id,
            'lord_account_id' => fake()->numberBetween(10000000),
            'params' => $params,
            'is_active' => fake()->boolean(),
            'params_updated_at' => now(),
            'params_readed_at' => now(),
            'time_start' => now(),
            'time_end' => now()->addMonth(),
        ];
    }
}
