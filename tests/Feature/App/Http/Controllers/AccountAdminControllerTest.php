<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\{User, Account as AccountModel};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountAdminControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider storeProvider
     */
    public function test_store_with_invalid_params(
        $userId,
        $name,
        $lordAccountId,
        $timeStart,
        $timeEnd,
        $isActive,
        $resultMessage,
    ) {
        $user = User::factory()->create();
        if($userId == 3) {
            $userId = $user->id;
        }

        $payload = [
            'user_id'         => $userId,
            "name"            => $name,
            "lord_account_id" => $lordAccountId,
            'time_start'      => $timeStart,
            'time_end'        => $timeEnd,
            'is_active'       => $isActive,
        ];

        $admin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($admin, 'web');

        $response = $this->json('post',
            route('admin.accounts.store'),
            $payload,
            ['Accept' => 'application/json'],
        );

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors' => [$resultMessage => []]]);
    }

    public function storeProvider()
    {
        return [
            [123123, "Nome", 7783643764, '2023/07/07 00:00', '2023/07/10 00:00', '1', 'user_id'],
            [123,    "Nome", 7783643764, '2023/07/07 00:00', '2023/07/10 00:00', '1', 'user_id'],
            [3,      "Nome", '', '2023/07/07 00:00', '2023/07/10 00:00', '1', 'lord_account_id'],
            [3,      "Nome", 8378563476, '', '2023/07/10 00:00', '1', 'time_start'],
            [3,      "Nome", 8378563476, '2023/07/07 00:00', '', '1', 'time_end'],
            [3,      "Nome", "Rodolfo", '2023/07/07 00:00', '2023/10/07 00:00', '', 'lord_account_id'],
        ];
    }

    public function test_store_with_valid_params() {
        $user = User::factory()->count(10)->create();

        $dateIni = now()->subDays(10);
        $dateEnd = now()->addMonths(4);

        $payload = [
            'user_id'         => $user[5]->id,
            "name"            => "Account 001",
            "lord_account_id" => 37465387654,
            'time_start'      => $dateIni->format('Y/m/d H:i'),
            'time_end'        => $dateEnd->format('Y/m/d H:i'),
            'is_active'       => '1',
        ];

        $admin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($admin, 'web');

        $response = $this->json('post',
            route('admin.accounts.store'),
            $payload,
            ['Accept' => 'application/json'],
        );

        $payload['time_start'] = $dateIni->format('Y-m-d H:i:00');
        $payload['time_end']   = $dateEnd->format('Y-m-d H:i:00');

        $response->assertStatus(302);
        $this->assertDatabaseHas('accounts', $payload);
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $dateIni = now()->subDays(10);
        $dateEnd = now()->addMonths(4);

        $payload = [
            'user_id'         => $user2->id,
            "name"            => "Account 001",
            "lord_account_id" => 37465387654,
            'time_start'      => $dateIni->format('Y/m/d H:i'),
            'time_end'        => $dateEnd->format('Y/m/d H:i'),
            'is_active'       => '1',
        ];
        
        $admin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($admin, 'web');

        $account = AccountModel::factory()->create();

        $response = $this->json('put',
            route('admin.accounts.update', $account),
            $payload,
            ['Accept' => 'application/json'],
        );

        $response->assertStatus(302);

        $payload['time_start'] = $dateIni->format('Y-m-d H:i:00');
        $payload['time_end']   = $dateEnd->format('Y-m-d H:i:00');

        $this->assertDatabaseHas('accounts', $payload);
    }
 
    public function test_update_invalid_account()
    {
        $user = User::factory()->create();

        $dateIni = now()->subDays(10);
        $dateEnd = now()->addMonths(4);

        $payload = [
            'user_id'         => $user->id . '123',
            "name"            => "Account 001",
            "lord_account_id" => 37465387654,
            'time_start'      => $dateIni->format('Y/m/d H:i'),
            'time_end'        => $dateEnd->format('Y/m/d H:i'),
            'is_active'       => '1',
        ];
        
        $admin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($admin, 'web');

        $account = AccountModel::factory()->create();

        $response = $this->json('put',
            route('admin.accounts.update', $account->id . '123'),
            $payload,
            ['Accept' => 'application/json'],
        );

        $response->assertStatus(404);
    }
 
    public function test_update_invalid_payload()
    {
        $payload = [
            'user_id'         => '',
            "name"            => "",
            "lord_account_id" => '',
            'time_start'      => '',
            'time_end'        => '',
            'is_active'       => '',
        ];
        
        $admin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($admin, 'web');

        $account = AccountModel::factory()->create();

        $response = $this->json('put',
            route('admin.accounts.update', $account->id),
            $payload,
            ['Accept' => 'application/json'],
        );

        $response->assertStatus(302);
    }

}
