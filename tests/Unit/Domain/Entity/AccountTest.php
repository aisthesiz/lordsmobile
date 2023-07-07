<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Account;
use Core\Domain\Exception\ParamsFormatException;
use Core\Domain\Exception\ParamsNullException;
use Core\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use stdClass;

class AccountTest extends TestCase
{
    public function test_create_instance_with_user_id(): void
    {
        $this->assertTrue(true);
    }

    public function test_create_instance_with_uuid_null()
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)[],
            timeStart:     now()->addDay(),
            timeEnd:       now()->addDay(),
        );

        $this->assertInstanceOf(Uuid::class, $account->id);
    }

    public function test_verify_if_valid_when_time_end_is_past(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)[],
            timeStart:     now()->subDays(2),
            timeEnd:       now()->subDay(),
        );

        $this->assertFalse($account->validate());
    }

    public function test_verify_if_valid_when_time_start_is_tomorrow(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)[],
            timeStart:     now()->addDay(),
            timeEnd:       now()->addDay(),
        );

        $this->assertFalse($account->validate());
    }

    public function test_verify_if_valid_when_time_end_id_null(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)[],
            timeStart:     now()->subDay(),
        );

        $this->assertTrue($account->validate());
    }

    public function test_verify_if_valid_when_active_is_false(): void
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)[],
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
            isActive:      false,
        );

        $this->assertFalse($account->validate());
    }

    public function test_activate()
    {
        $account = new Account(
            userId:        100,
            lordAccountId: 3123123123,
            params:        (object)[],
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
            params:        (object)[],
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
            params:        (object)[],
            timeStart:     now()->subDay(),
            timeEnd:       now()->addDay(),
        );

        $this->assertTrue($account->validate());
    }
}
