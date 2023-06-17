<?php

namespace Tests\Feature\App\Models;

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;
    public function test_is_active_test(): void
    {
        $account = Account::factory()->create([
            'user_id' => User::factory()->create()->id,
            'is_active' => true,
            'time_end' => now()->addMonth(),
        ]);
        $result = $account->is_active();

        $this->assertTrue($result);
    }

    public function test_is_active_time_end_is_past(): void
    {
        $user = User::factory()->create();
        $time_end = now()->subMonths(2)->format('Y-m-d H:i:s');
        $account = Account::factory()->create([
            'is_active' => true,
            'time_end' => $time_end,
        ]);
        $result = $account->is_active();

        $this->assertFalse($result);

        $this->assertDatabaseHas('accounts', ['is_active' => '0', 'time_end' => $time_end]);
    }
}
