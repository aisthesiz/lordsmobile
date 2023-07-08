<?php
namespace App\Builder;

use Core\Domain\Entity\Account as AccountEntity;
use Core\Domain\ValueObject\Uuid;

class AccountEntityBuilder
{
    public static function createFromAccountModel($accountModel)
    {
        return new AccountEntity(
            id:              new Uuid($accountModel->id),
            name:            $accountModel->name,
            userId:          $accountModel->user_id,
            lordAccountId:   $accountModel->lord_account_id,
            params:          $accountModel->params,
            timeStart:       $accountModel->time_start,
            timeEnd:         $accountModel->time_end,
            paramsUpdatedAt: $accountModel->params_updated_at,
            paramsReadedAt:  $accountModel->params_readed_at,
            isActive:        $accountModel->is_active,
            activatedAt:     $accountModel->activated_at,
            deactivatedAt:   $accountModel->deactivated_at,
        );
    }
}