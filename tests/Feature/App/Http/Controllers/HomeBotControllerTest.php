<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Account as AccountModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeBotControllerTest extends TestCase
{
    use RefreshDatabase;
    

    public function test_update_invalid_account(): void
    {
        $account = AccountModel::factory()->create();
        $user = $account->user;
        $this->actingAs($user, 'web');
        $response = $this->json('put', route('bot.accounts.update.settings', 'asdasdasdasd'),[
            'name' => 'New Name',
            'balance' => '123.45',  
        ]);
        $response->assertStatus(404);
    }


    public function test_update_with_unauthenticated_user(): void
    {
        $account = AccountModel::factory()->create();
        $response = $this->json('put', route('bot.accounts.update.settings', 'asdasdasdasd'),[
            'iban' => '123456789012345',
        ]);
        $response->assertStatus(401);
    }


    public function test_update_with_user_is_not_owner_of_account(): void
    {
        $account = AccountModel::factory()->create();
        $otherUser = User::factory()->create();
        $this->actingAs($otherUser, 'web');
        $params = json_decode(file_get_contents(storage_path('configs/settings.json')), true);
        
        $response = $this->json(
            'put',
            route('bot.accounts.update.settings', $account->id),
            $params,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'TestSystemLordsmobile/0.1.0'
            ]
        );
        $response->assertJsonStructure(['message']);
        $response->assertStatus(404);
    }


    public function test_update_with_invalid_params(): void
    {
        $account = AccountModel::factory()->create();
        $this->actingAs($account->user, 'web');
        $params = json_decode(file_get_contents(storage_path('configs/settings.json')));
        $idWithError = 12;
        foreach($params->eventSettings->guildFest->gfMissionComplete->missionsToComplete_ as $key => $item) {
            if ($key == $idWithError) {
                $item->ToComplete = 'ERROR';
            }
        }

        $params = json_decode(json_encode($params), true);

        $response = $this->json(
            'put',
            route('bot.accounts.update.settings', $account->id),
            $params,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'TestSystemLordsmobile/0.1.0'
            ]
        );
        
        $response->assertContent("{\"message\":\"eventSettings->guildFest->gfMissionComplete->missionsToComplete_[{$idWithError}]->ToComplete must be a bool\"}");
        $response->assertStatus(422);
    }

    /**
     * @dataProvider stringLikeNull
     */
    public function test_update_with_invalid_params_empty_string_like_null(
        string|null $mMailPlayerName,
        string|null $playerToSend,
        string|null $savedProxy,
        string $error,
    ): void
    {
        $account = AccountModel::factory()->create();
        $this->actingAs($account->user, 'web');
        $params = json_decode(file_get_contents(storage_path('configs/settings.json')));
        
        $params->eventSettings->guildFest->gfMissionComplete->mMailPlayerName = $mMailPlayerName;
        $params->supplySettings->playerToSend = $playerToSend;
        $params->connectionSettings->savedProxy = $savedProxy;

        $params = json_decode(json_encode($params), true);

        $response = $this->json(
            'put',
            route('bot.accounts.update.settings', $account->id),
            $params,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'TestSystemLordsmobile/0.1.0'
            ]
        );
        
        $response->assertContent($error);
        $response->assertStatus(422);
    }

    public function stringLikeNull()
    {
        return [
            [null, "", "", '{"message":"\"eventSettings->guildFest->gfMissionComplete->mMailPlayerName\" must be a string value."}'],
            ["", null, "", '{"message":"\"supplySettings->playerToSend\" must be a string value."}'],
            ["", "", null, '{"message":"\"connectionSettings.savedProxy\" must be a string value."}'],
        ];
    }


    public function test_update_with_valid_params(): void
    {
        $account = AccountModel::factory()->create();
        $this->actingAs($account->user, 'web');
        $params = json_decode(file_get_contents(storage_path('configs/settings.json')));
        $idUpdate = 12;
        foreach($params->eventSettings->guildFest->gfMissionComplete->missionsToComplete_ as $key => $item) {
            if ($key == $idUpdate) {
                $item->ToComplete = true;
                $item->TakeIfHigherThanPoints = 10;
                $item->MaxPoints = 500;
            }
        }

        $response = $this->json(
            'put',
            route('bot.accounts.update.settings', $account->id),
            (array)$params,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'TestSystemLordsmobile/0.1.0'
            ]
        );

        $account->refresh();
        $params = $account->params;

        foreach($params->eventSettings->guildFest->gfMissionComplete->missionsToComplete_ as $key => $item) {
            if ($key == $idUpdate) {
                $this->assertTrue($item->ToComplete);
                $this->assertEquals(10, $item->TakeIfHigherThanPoints);
                $this->assertEquals(500, $item->MaxPoints);
            }
        }
        
        $response->assertStatus(200);
    }
}
