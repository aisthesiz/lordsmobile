<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Account;
use Core\Domain\Exception\ParamsFormatException;

class AccountParamsTest extends AccountBase
{

    public function test_instance_and_validate_params_estructure_when_params_is_null()
    {
        $this->expectException(ParamsFormatException::class);
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)[],
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );
        $account->validateParams();
        $this->assertTrue(false);
    }

    public function test_instance_and_validate_params_estructure_when_params_is_invalid_estructure()
    {
        $this->expectException(ParamsFormatException::class);
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)["name" => "Must throw an expection"],
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );
        $account->validateParams();
    }

    public function test_instance_and_validate_params_estructure_when_params_is_valid_estructure()
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );
        $account->validateParams();
        $this->assertTrue(true);
    }


    public function test_instance_and_validate_params_estructure_when_params_is_rally_settings_is_invalid()
    {
        $this->expectException(ParamsFormatException::class);
        $params = $this->makeParams();
        $params->rallySettings->addBuffers = 123123;
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $params,
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );
        $account->validateParams();
        $this->assertTrue(true);
    }


    public function test_instance_and_validate_params_estructure_when_params_is_research_settings_is_invalid()
    {
        $this->expectException(ParamsFormatException::class);
        $params = $this->makeParams();
        $params->researchSettings->useTechnolabes = 123;
        $params->researchSettings->techTarget[4]->TechID = false;
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $params,
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );
        $account->validateParams();
        $this->assertTrue(true);
    }

    public function test_updated_params_date_when_new_params_is_invalid()
    {
        $params = $this->makeParams();
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $params,
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );

        $newParams = $this->makeParams();
        $newParams->rallySettings->addBuffers = 123123;
        $this->expectExceptionMessage('rallySettings->addBuffers must be a bool');
        $account->updateParams($newParams);
    }

    public function test_update_params_when_new_params_valid()
    {
        $params = $this->makeParams();
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $params,
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );

        $newParams = $this->makeParams();
        $newParams->rallySettings->addBuffers = true;
        $account->updateParams($newParams);

        $this->assertEquals(
            true,
            $account->params->rallySettings->addBuffers
        );
    }

    public function test_updated_at_params()
    {
        $params = $this->makeParams();
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $params,
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );

        $newParams = $this->makeParams();
        $newParams->rallySettings->addBuffers = true;
        $account->updateParams($newParams);

        $this->assertNotEmpty($account->paramsUpdatedAt);
        $this->assertEquals(
            now()->format('Y-m-d H:i'),
            $account->paramsUpdatedAt->format('Y-m-d H:i')
        );
    }
}
