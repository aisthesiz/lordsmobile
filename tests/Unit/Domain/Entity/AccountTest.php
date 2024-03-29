<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Account;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Exception\ParamsFormatException;
use Core\Domain\Exception\ParamsNullException;
use Core\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use stdClass;

class AccountTest extends AccountBase
{
    public function test_create_instance_with_uuid_null()
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now(),
            timeEnd:       now()->addDay(),
        );

        $this->assertInstanceOf(Account::class, $account);
    }

    public function test_verify_if_activete_when_time_end_is_past(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDays(2),
            timeEnd:       now()->subDay(),
        );

        $this->assertFalse($account->isActivate());
    }

    public function test_verify_if_activete_when_time_start_is_tomorrow(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->addDay(),
            timeEnd:       now()->addDay(),
        );
        $this->assertFalse($account->isActivate());
    }

    public function test_verify_if_activete_when_is_active_if_false(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDays(10),
            timeEnd:       now()->addDays(10),
            isActive:      false,
        );
        $this->assertFalse($account->isActivate());
    }

    public function test_verify_if_valid_when_time_end_id_null(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            isActive:      true,
        );

        $this->assertTrue($account->isActive);

    }

    public function test_verify_if_valid_when_active_is_false(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
            isActive:      false,
        );

        $this->assertFalse($account->isActive);
    }

    public function test_activate()
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
            isActive:      false,
        );

        $this->assertFalse($account->isActive);
        $account->activate();
        $this->assertNotNull($account->activatedAt);
        $this->assertEquals(
            $account->activatedAt->format('Y-m-d H:i'),
            now()->format('Y-m-d H:i')
        );
        $this->assertTrue($account->isActive);
    }


    public function test_deactivate()
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
            isActive:      true,
        );

        $this->assertTrue($account->isActive);
        $account->deactivate();
        $this->assertNotNull($account->deactivatedAt);
        $this->assertEquals(
            $account->deactivatedAt->format('Y-m-d H:i'),
            now()->format('Y-m-d H:i')
        );
        $this->assertFalse($account->isActive);
    }

    public function test_verify_if_valid_when_time_is_valid(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );

        $this->assertTrue($account->isValid());
    }

    public function test_update()
    {
        $account = new Account(
            userId:        100,
            name:          "Created",
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
            isActive:      true,
        );

        $account->update(
            "Updated",
            101,
            11111111111111,
            now()->subHours(4),
            now()->addDays(5),
        );

        $this->assertEquals('Updated', $account->name);
        $this->assertEquals(101, $account->userId);
        $this->assertEquals(now()->subHours(4)->format('Y-m-d H:i'), $account->timeStart->format('Y-m-d H:i'));
        $this->assertEquals(now()->addDays(5)->format('Y-m-d H:i'), $account->timeEnd->format('Y-m-d H:i'));
    }

    public function test_update_when_is_active_and_time_end_is_past()
    {
        $account = new Account(
            userId:        100,
            name:          "Created",
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDays(10),
            isActive:      true,
        );

        $account->update(
            name:          "Updated",
            userId:        101,
            lordAccountId: 11111111111111,
            timeStart:     now()->subHours(4),
            timeEnd:       now()->subDay(),
        );

        $this->assertEquals('Updated', $account->name);
        $this->assertEquals(101, $account->userId);
        $this->assertEquals(now()->subHours(4)->format('Y-m-d H:i'), $account->timeStart->format('Y-m-d H:i'));
        $this->assertEquals(now()->subDay()->format('Y-m-d H:i'), $account->timeEnd->format('Y-m-d H:i'));
        $this->assertFalse($account->isActivate());
    }

    public function test_can_activate_false()
    {
        $account = new Account(
            userId:        100,
            name:          "Created",
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subMonths(5),
            timeEnd:       now()->subDay(),
            isActive:      false,
        );

        $this->assertFalse($account->canActivate());
    }

    public function test_can_activate()
    {
        $account = new Account(
            userId:        100,
            name:          "Created",
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subMonths(5),
            timeEnd:       now()->addDays(10),
            isActive:      false,
        );

        $this->assertTrue($account->canActivate());
    }


    public function test_can_activate_time_end_is_null()
    {
        $account = new Account(
            userId:        100,
            name:          "Created",
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subMonths(5),
            isActive:      false,
        );

        $this->assertTrue($account->canActivate());
    }

    public function test_change_ownner()
    {
        $account = new Account(
            userId:        100,
            name:          "Created",
            lordAccountId: 3123123123,
            params:        $this->makeParams(),
            timeStart:     now()->subMonths(1),
            timeEnd:       now()->addMonths(5),
            isActive:      false,
        );

        $account->changeOwnner(101);

        $this->assertEquals(101, $account->userId);
    }
}
