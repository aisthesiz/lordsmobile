<?php

namespace Tests\Feature\App\Http\Controllers\Api;

use App\Builder\AccountEntityBuilder;
use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class AccountApiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_request_to_get_an_account_params(): void
    {
        $role = Role::create(['name' => 'api']);
        $permission = Permission::create(['name' => 'read api']);
        $permission2 = Permission::create(['name' => 'write api']);
        $role->givePermissionTo($permission, $permission2);

        $userApi = User::factory()->create();
        $userApi->assignRole($role);
        $this->actingAs($userApi, 'web');

        User::factory()->create();
        $accountModel = Account::factory()->create();
        $account = AccountEntityBuilder::createFromAccountModel($accountModel);
        $lordAccountId = $account->lordAccountId;
        $response = $this->json('get',
            '/api/accounts/?accounts='.$lordAccountId
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            $lordAccountId => [
                'speedUpSettings'    => [],
                'gatherSettings'     => [],
                'rallySettings'      => [],
                'connectionSettings' => [],
                'cargoShipSettings'  => [],
                'supplySettings'     => [],
                'heroSettings'       => [],
                'heroStageSettings'  => [],
                'arenaSettings'      => [],
                'buildSettings'      => [],
                'troopSettings'      => [],
                'miscSettings'       => [],
                'monsterSettings'    => [],
            ]
        ]);
    }

    public function test_request_to_get_an_account_invalid_lordAccountId(): void
    {
        $role = Role::create(['name' => 'api']);
        $permission = Permission::create(['name' => 'read api']);
        $permission2 = Permission::create(['name' => 'write api']);
        $role->givePermissionTo($permission, $permission2);

        $userApi = User::factory()->create();
        $userApi->assignRole($role);
        $this->actingAs($userApi, 'web');

        User::factory()->create();
        $accountModel = Account::factory()->create();
        $account = AccountEntityBuilder::createFromAccountModel($accountModel);
        $response = $this->json('get',
            '/api/accounts/?accounts=INVALID_ID'
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([]);
    }

    public function test_request_invalid_user_api_permission(): void
    {
        $role = Role::create(['name' => 'api']);
        $userApi = User::factory()->create();
        $this->actingAs($userApi, 'web');

        User::factory()->create();
        $accountModel = Account::factory()->create();
        $account = AccountEntityBuilder::createFromAccountModel($accountModel);
        $response = $this->json('get',
            '/api/accounts/?accounts='.$account->lordAccountId
        );

        $response->assertStatus(403);
    }

    public function test_get_by_id_when_account_id_is_invalid()
    {
        $role = Role::create(['name' => 'api']);
        $permission = Permission::create(['name' => 'read api']);
        $permission2 = Permission::create(['name' => 'write api']);
        $role->givePermissionTo($permission, $permission2);

        $userApi = User::factory()->create();
        $userApi->assignRole($role);
        $this->actingAs($userApi);

        $response = $this->json('get',
            route('api.accounts.get-by-id', '487598579457'),
        );
// $response->dd();
        $response->assertJsonStructure(['message']);
        $this->assertEquals("Conta não encontrada", $response->json('message'));
        $response->assertStatus(404);
    }

    public function test_get_by_id_with_valid_id()
    {
        $role = Role::create(['name' => 'api']);
        $permission = Permission::create(['name' => 'read api']);
        $permission2 = Permission::create(['name' => 'write api']);
        $role->givePermissionTo($permission, $permission2);

        $userApi = User::factory()->create();
        $userApi->assignRole($role);

        $this->actingAs($userApi, 'web');

        $accountModel = Account::factory()->create();
        $account = AccountEntityBuilder::createFromAccountModel($accountModel);

        $response = $this->json('get',
            route('api.accounts.get-by-id', $account->lordAccountId),
        );

        $response->assertJsonStructure([
            'speedUpSettings',
            'gatherSettings',
            'rallySettings',
            'connectionSettings',
            'cargoShipSettings',
            'supplySettings',
            'heroSettings',
            'heroStageSettings',
            'arenaSettings',
            'buildSettings',
            'eventSettings',
            'researchSettings',
            'troopSettings',
            'miscSettings',
            'monsterSettings',
        ]);

        $response->assertStatus(200);
    }
}
