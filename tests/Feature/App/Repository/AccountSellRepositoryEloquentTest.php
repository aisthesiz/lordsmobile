<?php

namespace Tests\Feature\App\Repository;

use App\Models\AccountSell as Model;
use App\Repository\AccountSellRepositoryEloquent as Repository;
use Core\Domain\Entity\AccountSell as Entity;
use Core\Domain\Repository\AccountSellRepositoryInterface;
use Core\Domain\ValueObject\Uuid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountSellRepositoryEloquentTest extends TestCase
{
    use RefreshDatabase;
    protected AccountSellRepositoryInterface $repository;

    public function test_implements_interfaces(): void
    {
        $repository = new Repository(new Model());
        $this->assertInstanceOf(AccountSellRepositoryInterface::class, $repository);
    }

    // public function teste_insert()
    // {
    //     $entity = $this->createEntity();
    //     $this->repository->insert($entity);
    //     $this->assertDatabaseCount(Model::class, 1);
    //     $this->assertDatabaseHas(Model::class, [
    //         'id'    => $entity->id(),
    //         'title' => 'Test title',
    //         'statsBow' => 231,
    //         'statsSword' => 123,
    //         'statsHorse' => 123,
    //         'heroesPayed' => 20,
    //         'heroesFree' => 100,
    //         'artifacts' =>10,
    //         'skins' =>100,
    //         'troops' =>100,
    //         'description' => 'This is a description',
    //     ]);

    // }

    protected function setUp(): void
    {
        $this->repository = new Repository(new Model());
    }

    private function createEntity()
    {
        return new Entity(
            title: 'Test title',
            might: 82347528938475,
            id: Uuid::random(),
            statsBow: 231,
            statsSword: 123,
            statsHorse: 123,
            heroesPayed: 20,
            heroesFree: 100,
            artifacts:10,
            skins:100,
            troops:100,
            description: 'This is a description',
        );
    }
}
