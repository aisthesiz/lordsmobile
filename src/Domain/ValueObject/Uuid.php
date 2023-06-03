<?php

namespace Core\Domain\ValueObject;

use Core\Domain\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
        $this->validate();
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    private function validate(): void
    {
        if (!RamseyUuid::isValid($this->value)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allowed value <%s>', self::class, $this->value),
            );
        }
    }

    public function __toString()
    {
        return $this->value;
    }
}
