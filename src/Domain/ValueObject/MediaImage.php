<?php

namespace Core\Domain\ValueObject;

class MediaImage
{
    public function __construct(
        protected string $path,
    ) {}

    public function path(): string
    {
        return $this->path;
    }
}
