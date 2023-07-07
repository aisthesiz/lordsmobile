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
        protected object    $params,
        protected DateTime  $timeStart,
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
            throw new EntityValidationException('timeStart is future');
        }

        if (!empty($timeEnd) && $timeEnd->lt(now())) {
            throw new EntityValidationException('timeEnd is past');
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

    public function updateParams(object $newParams): void
    {
        $validateParams = new ParamsValidation();
        $validateParams->validation($newParams);

        $this->params = $newParams;
        $this->paramsUpdatedAt = new DateTime('now');
    }

    public function getParamsUpdatedAt(): DateTime|null
    {
        return $this->paramsUpdatedAt;
    }



    public function validateParams(): void
    {
        $validateParams = new ParamsValidation();
        $validateParams->validation($this->params);
    }
}