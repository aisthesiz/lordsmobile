<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTransferAdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_account_nobody_logged(): void
    {
        $response = $this->get(
            route('admin.ajax.account-transfer.find')."?account=7643485763856",
            ['Accept' => 'application/json'],
        );
        $response->assertExactJson(["message" => "Unauthenticated."]);
        $response->assertStatus(401);
    }

    public function test_get_account_user_logged_not_admin(): void
    {
        $userAdmin = User::factory()->create(['is_admin' => '0']);
        $this->actingAs($userAdmin, 'web');

        $response = $this->get(
            route('admin.ajax.account-transfer.find')."?account=7643485763856",
            ['Accept' => 'application/json'],
        );
        $response->assertSessionHas(["error" => "You can't access this section"]);
        $response->assertStatus(302);
    }

    public function test_get_account_not_exists(): void
    {
        $userAdmin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($userAdmin, 'web');

        $response = $this->get(
            route('admin.ajax.account-transfer.find')."?account=7643485763856",
            ['Accept' => 'application/json']
        );
        $response->assertStatus(404);
        $response->assertExactJson(['message' => 'Conta não encontrada']);
    }

    public function test_get_account(): void
    {
        $userAdmin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($userAdmin, 'web');

        $account = Account::factory()->create();

        $response = $this->get(
            route('admin.ajax.account-transfer.find')."?account={$account->lord_account_id}",
            ['Accept' => 'application/json']
        );
        $response->assertStatus(200);
        $response->assertExactJson([
            'account'    => $account->id,
            'igg'        => $account->lord_account_id,
            'user_id'    => $account->user_id,
            'user_name'  => $account->user->name,
            'user_email' => $account->user->email,
        ]);
    }

    public function test_change_ownner_user_invalid()
    {
        $userAdmin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($userAdmin, 'web');

        $account = Account::factory()->create();

        $response = $this->put(
            route('admin.ajax.account-transfer.transfer'),
            [
                'id'           => $account->id,
                'user_id'      => 110,
                'X-CSRF-TOKEN' => csrf_token(),
            ],
            ['Accept' => 'application/json']
        );

        $response->assertExactJson([
            'message' => 'The selected user id is invalid.',
            'errors' => [
                'user_id' => ['The selected user id is invalid.'],
            ]
        ]);
        $response->assertStatus(422);
    }

    public function test_change_ownner_account_id_is_invalid()
    {
        $userAdmin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($userAdmin, 'web');

        $account = Account::factory()->create();
        $userNewOwnner = User::factory()->create();

        $response = $this->put(
            route('admin.ajax.account-transfer.transfer'),
            [
                'id'           => $account->id . '0',
                'user_id'      => $userNewOwnner->id,
                'X-CSRF-TOKEN' => csrf_token(),
            ],
            ['Accept' => 'application/json']
        );

        $response->assertExactJson([
            'message' => 'The selected id is invalid.',
            'errors' => [
                'id' => ['The selected id is invalid.'],
            ]
        ]);
        $response->assertStatus(422);
    }

    public function test_change_ownner()
    {
        $userAdmin = User::factory()->create(['is_admin' => '1']);
        $this->actingAs($userAdmin, 'web');

        $account = Account::factory()->create();
        $userNewOwnner = User::factory()->create();

        $response = $this->put(
            route('admin.ajax.account-transfer.transfer'),
            [
                'id'           => $account->id,
                'user_id'      => $userNewOwnner->id,
                'X-CSRF-TOKEN' => csrf_token(),
            ],
            ['Accept' => 'application/json']
        );

        $response->assertExactJson([
            'message' => 'Conta alterada com sucesso.'
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('accounts', [
            'id' => $account->id,
            'lord_account_id' => $account->lord_account_id,
            'user_id' => $userNewOwnner->id,
        ]);
    }
}
