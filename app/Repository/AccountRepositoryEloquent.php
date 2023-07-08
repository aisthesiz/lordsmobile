<?php

namespace App\Repository;

use App\Models\Account as Repository;
use App\Repositories\Presenters\PaginationPresenter;
use Core\Domain\Repository\{
    AccountRepositoryInterface,
    PaginationInterface,
};
use Core\Domain\Entity\Account as Entity;
use Core\Domain\Exception\NotFoundException;
use Core\Domain\ValueObject\Uuid;
use Exception;

class AccountRepositoryEloquent implements AccountRepositoryInterface
{

    public function __construct(
        protected Repository $repository,
    ) {}

    public function insert(Entity $entity): Entity
    {
        $dataInsert = [
            'id'                => $entity->id(),
            'user_id'           => $entity->userId,
            'name'              => $entity->name,
            'lord_account_id'   => $entity->lordAccountId,
            'params'            => $entity->params,
            'time_start'        => $entity->timeStart->format('Y-m-d H:i:s'),
            'time_end'          => $entity->timeEnd?->format('Y-m-d H:i:s'),
            'params_updated_at' => $entity->paramsUpdatedAt?->format('Y-m-d H:i:s'),
            'params_readed_at'  => $entity->paramsReadedAt?->format('Y-m-d H:i:s'),
            'is_active'         => $entity->isActive ? '1' : '0',
            'activated_at'      => $entity->activatedAt?->format('Y-m-d H:i:s'),
            'deactivated_at'    => $entity->deactivatedAt?->format('Y-m-d H:i:s'),
        ];

        $entityDb = $this->repository->create($dataInsert);
        if (!$entityDb) {
            throw new Exception(
                sprintf('<%s> error DB to create entity <%s>', self::class, $entity->id()),
            );
        }
        return $this->toEntity($entityDb);
    }

    public function update(Entity $entity): Entity
    {
        if ($entityDb = $this->repository->find($entity->id()))
        {
            throw new NotFoundException(
                sprintf('<%s> nto found DB registry <%s>', self::class, $entity->id()),
            );
        }
        $data = [
            'id' => $entity->id(),
            'might' => $entity->might,
            'stats_sword' => $entity->statsSword,
            'stats_bow' => $entity->statsBow,
            'stats_horse' => $entity->statsHorse,
            'heroes_payed' => $entity->heroesPayed,
            'heroes_free' => $entity->heroesFree,
            'artifacts' => $entity->artifacts,
            'skins' => $entity->skins,
            'troops' => $entity->troops,
            'description' => $entity->description,
        ];
        $this->repository->updateOrFail($data);
        return $this->toEntity($entityDb);
    }

    public function delete(string $uuid): bool
    {
        if ($entityDb = $this->repository->find($uuid))
        {
            throw new NotFoundException(
                sprintf('<%s> nto found DB registry <%s>', self::class, $uuid),
            );
        }

        return $entityDb->delete();
    }


    public function findById(string $uuid): Entity
    {
        if ($entityDb = $this->repository->find($uuid))
        {
            throw new NotFoundException(
                sprintf('<%s> nto found DB registry <%s>', self::class, $uuid),
            );
        }
        return $this->toEntity($entityDb);
    }

    public function findAll(string $filter = '', $order = 'DESC'): array
    {
        return $this->repository->all()->toArray();
    }

    public function paginate
    (
        string $filter = '',
        $order = 'DESC',
        $page = '1',
        $totalPerPage = 15
    ): PaginationInterface {
        $paginateResponse = $this->repository->orderBy('id', $order)->paginate($totalPerPage);
        return new PaginationPresenter($paginateResponse);
    }

    protected function toEntity(Repository $item)
    {
        $params = json_decode(json_encode($item->params));
        return new Entity(
            id: new Uuid($item->id),
            userId: $item->user_id,
            name: $item->name,
            lordAccountId: $item->lord_account_id,
            params: $params,
            timeStart: $item->time_start,
            timeEnd: $item->time_end,
            paramsUpdatedAt: $item->params_updated_at,
            paramsReadedAt: $item->params_readed_at,
            isActive: $item->is_active,
            activatedAt: $item->activated_at,
            deactivatedAt: $item->deactivated_at,
        );
    }

}
