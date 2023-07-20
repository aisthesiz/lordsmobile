<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\{User, Account as AccountModel};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAccountAdminControllerTest extends TestCase
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
        $codeError,
    ) {
        $user = User::factory()->create();
        $flagUser = false;
        if ($userId == 3) {
            $flagUser = true;
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

        $response = $this->post(
            route('admin.user.accounts.store', $userId),
            $payload,
            [
                'X-CSRF-TOKEN' => csrf_token(),
            ]
        );
        
        if ($flagUser) {
            $response->assertSessionHasErrors($resultMessage);
        }
        $response->assertStatus($codeError);
    }

    public function storeProvider()
    {
        return [
            [123123, "Nome", 7783643764, '2023/07/07 00:00', '2023/07/10 00:00', '1', 'user_id', 404],
            [123,    "Nome", 7783643764, '2023/07/07 00:00', '2023/07/10 00:00', '1', 'user_id', 404],
            [3,      "Nome", '', '2023/07/07 00:00', '2023/07/10 00:00', '1', 'lord_account_id', 302],
            [3,      "Nome", 8378563476, '', '2023/07/10 00:00', '1', 'time_start', 302],
            [3,      "Nome", 8378563476, '2023/07/07 00:00', '', '1', 'time_end', 302],
            [3,      "Nome", "Rodolfo", '2023/07/07 00:00', '2023/10/07 00:00', '', 'lord_account_id', 302],
        ];
    }

    public function test_store_with_valid_params() {

        $total = 10;
        $current = random_int(0, $total - 1);
        $users = User::factory()->count($total)->create();
        $dateIni = now()->subDays(10);
        $dateEnd = now()->addMonths(4);

        $payload = [
            "name"            => "Account 001",
            "lord_account_id" => 37465387654,
            'time_start'      => $dateIni->format('Y/m/d H:i'),
            'time_end'        => $dateEnd->format('Y/m/d H:i'),
            'is_active'       => '1',
        ];

        $admin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($admin, 'web');

        $response = $this->json('post',
            route('admin.user.accounts.store', $users[$current]),
            $payload,
            [
                'X-CSRF-TOKEN' => csrf_token(),
            ],
        );

        $payload['time_start'] = $dateIni->format('Y-m-d H:i:00');
        $payload['time_end']   = $dateEnd->format('Y-m-d H:i:00');

        $response->assertStatus(302);
        $this->assertDatabaseHas('accounts', $payload);
    }

    public function test_update()
    {
        // $user = User::factory()->create();
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

        $account = AccountModel::factory()->create([
            'user_id' => $user2->id
        ]);

        $response = $this->put(
            route('admin.user.accounts.update', [$user2, $account]),
            $payload,
            [
                'X-CSRF-TOKEN' => csrf_token(),
            ],
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
            route('admin.user.accounts.update', [$user, $account->id . '123']),
            $payload,
            [
                'Accept' => 'application/json',
                'X-CSRF-TOKEN' => csrf_token(),
            ],
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
            route('admin.user.accounts.update', [$admin, $account->id]),
            $payload,
            [
                'Accept' => 'application/json',
                'X-CSRF-TOKEN' => csrf_token(),
            ],
        );

        $response->assertStatus(302);
    }

}
