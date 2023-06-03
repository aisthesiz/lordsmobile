<?php

namespace Tests\Unit\Domain\ValueObject;

use Core\Domain\Exception\InvalidArgumentException;
use Core\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid as RamseyUuid;

class UuidTest extends TestCase
{
    public function test_instantiate_with_invalid_value(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Uuid('UUID');
    }

    public function test_instantiate_with_valid_value()
    {
        $value = RamseyUuid::uuid4()->toString();
        $uuid = new Uuid($value);
        $this->assertInstanceOf(Uuid::class, $uuid);
    }

    public function test_create_random()
    {
        $uuid = Uuid::random();
        $this->assertInstanceOf(Uuid::class, $uuid);
    }

    public function test_verify_to_string()
    {
        $value = RamseyUuid::uuid4()->toString();
        $uuid = new Uuid($value);
        $this->assertEquals($value, $uuid->toString());
    }
}
