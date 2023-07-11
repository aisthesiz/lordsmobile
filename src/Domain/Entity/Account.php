<?php
namespace Core\Domain\Entity;

use App\Models\User;
use Core\Domain\Entity\Traits\MethodsMagicTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\ParamsValidation;
use Core\Domain\ValueObject\Uuid;
use DateTime;
use Illuminate\Support\Carbon;
use stdClass;

class Account
{

    use MethodsMagicTrait;

    public function __construct(
        protected int       $userId,
        protected int       $lordAccountId,
        protected stdClass  $params,
        protected DateTime  $timeStart,
        protected ?string   $name            = "",
        protected ?Uuid     $id              = null,
        protected ?DateTime $timeEnd         = null,
        protected ?DateTime $paramsUpdatedAt = null,
        protected ?DateTime $paramsReadedAt  = null,
        protected bool      $isActive        = true,
        protected ?DateTime $activatedAt     = null,
        protected ?DateTime $deactivatedAt   = null,
    ) {
        if ($this->id == null) {
            $this->id = Uuid::random();
        }

        $this->validateTimeAndParams();
    }

    public function validateTimeAndParams(): void
    {
        $timeStart = new Carbon($this->timeStart);
        $timeEnd   = !empty($this->timeEnd) ? new Carbon($this->timeEnd) : null;

        if ($timeStart->gt(now())) {
            throw new EntityValidationException('timeStart is future', 422);
        }

        if (!empty($timeEnd) && $timeEnd->lt(now())) {
            throw new EntityValidationException('timeEnd is past', 422);
        }

        $this->validateParams();
    }

    public function deactivate(): void
    {
        $this->isActive = false;
        $this->deactivatedAt = new DateTime('now');
    }

    public function activate(): void
    {
        $this->isActive = true;
        $this->deactivatedAt = null;
        $this->activatedAt = new DateTime('now');
    }

    public function isValid() : bool
    {
        $timeStart = new Carbon($this->timeStart);
        $timeEnd   = !empty($this->timeEnd) ? new Carbon($this->timeEnd) : null;

        if ($timeStart->gt(now())) {
            return false;
        }

        if (!empty($timeEnd) && $timeEnd->lt(now())) {
            return false;
        }

        if (!$this->isActive) {
            return false;
        }

        return true;
    }

    public function update(
        string $name, 
        int $userId, 
        int $lordAccountId, 
        DateTime $timeStart,
        DateTime $timeEnd,
    ) {
        $this->name   = $name;
        $this->userId = $userId;
        $this->lordAccountId = $lordAccountId;
        $this->timeStart     = $timeStart;
        $this->timeEnd       = $timeEnd;

        $this->validateTimeAndParams();
    }

    public function updateParams(object $newParams): void
    {
        $validateParams = new ParamsValidation();
        $validateParams->validation($newParams);

        $this->params = $newParams;
        $this->paramsUpdatedAt = new DateTime('now');
    }

    public function validateParams(): void
    {
        $validateParams = new ParamsValidation();
        $validateParams->validation($this->params);
    }
}