<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicTrait;
use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObject\{
    MediaImage,
    Uuid,
};

use function PHPUnit\Framework\isNull;

class AccountSell
{
    use MethodsMagicTrait;

    public function __construct(
        protected string $title,
        protected int $might,
        protected ?Uuid $id = null,
        protected ?int $statsSword = null,
        protected ?int $statsBow = null,
        protected ?int $statsHorse = null,
        protected ?int $heroesPayed = null,
        protected ?int $heroesFree = null,
        protected ?int $artifacts = null,
        protected ?int $skins = null,
        protected ?int $troops = null,
        protected bool $isVerified = true,
        protected ?string $description = '',
        public ?MediaImage $image1 = null,
        public ?MediaImage $image2 = null,
        public ?MediaImage $image3 = null,
        public ?MediaImage $image4 = null,
        public ?MediaImage $image5 = null,
        public ?MediaImage $image6 = null,
    ) {
        if (isNull($id)) {
            $this->id = Uuid::random();
        }

        $this->validate();
    }

    public function update(
        string $title,
        int $might,
        int $statsSword = null,
        int $statsBow = null,
        int $statsHorse = null,
        int $heroesPayed = null,
        int $heroesFree = null,
        int $artifacts = null,
        int $skins = null,
        int $troops = null,
        string $description = null,
    ) {
        $this->title       = $title;
        $this->might       = $might;
        $this->statsSword  = $statsSword;
        $this->statsBow    = $statsBow;
        $this->statsHorse  = $statsHorse;
        $this->heroesPayed = $heroesPayed;
        $this->heroesFree  = $heroesFree;
        $this->artifacts   = $artifacts;
        $this->skins       = $skins;
        $this->troops      = $troops;
        $this->description = $description;

        $this->validate();
    }

    public function unverified()
    {
        $this->isVerified = false;
    }

    public function verified()
    {
        $this->isVerified = true;
    }

    protected function validate():void
    {
        DomainValidation::notNull($this->title, 'The title field is required.');
        DomainValidation::strMinLength($this->title, 2, "The title must be at least 2 characters.");
        DomainValidation::strMaxLength($this->title, 255, "The title must not be greater than 255 characters.");
        DomainValidation::strCanNullOrMinLength($this->description, 5, "The description is null or must be greater than 5 characters.");
    }
}
