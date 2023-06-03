<?php

namespace App\Repository;

use App\Models\AccountSell as Repository;
use App\Repositories\Presenters\PaginationPresenter;
use Core\Domain\Repository\{
    AccountSellRepositoryInterface,
    PaginationInterface,
};
use Core\Domain\Entity\AccountSell as Entity;
use Core\Domain\Exception\NotFoundException;
use Core\Domain\ValueObject\Uuid;
use Exception;

class AccountSellRepositoryEloquent implements AccountSellRepositoryInterface
{

    public function __construct(
        protected Repository $repository,
    ) {}

    public function insert(Entity $entity): Entity
    {
        $entityDb = $this->repository->create([
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
        ]);
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
        return new Entity(
            title: $item->title,
            might: $item->might,
            id: new Uuid($item->id),
            statsSword: $item->stats_sword,
            statsBow: $item->stats_bow,
            statsHorse: $item->stats_horse,
            heroesPayed: $item->heroes_payed,
            heroesFree: $item->heroes_free,
            artifacts: $item->artifacts,
            skins: $item->skins,
            troops: $item->troops,
        );
    }

}
