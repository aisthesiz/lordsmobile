<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\AccountSell as Entity;
use Core\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Str;

class AccountSellTest extends TestCase
{
    public function test_instance(): void
    {
        $entity = new Entity(
            title: 'Test title',
            might: 100000,
        );
        $this->assertInstanceOf(Entity::class, $entity);
        $this->assertInstanceOf(Uuid::class, $entity->id);
    }

    public function test_instance_all_params_without_images(): void
    {
        $entity = new Entity(
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
            description: fake()->text(),
        );
        $this->assertInstanceOf(Entity::class, $entity);
        $this->assertInstanceOf(Uuid::class, $entity->id);
        $this->assertEquals(82347528938475, $entity->might);
        $this->assertEquals(231, $entity->statsBow);
        $this->assertEquals(123, $entity->statsSword);
        $this->assertEquals(123, $entity->statsHorse);
        $this->assertEquals(20, $entity->heroesPayed);
        $this->assertEquals(100, $entity->heroesFree);
        $this->assertEquals(100, $entity->skins);
        $this->assertEquals(100, $entity->troops);
    }

    public function test_update()
    {
        $entity = new Entity(
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
            description: 'Asddsdasd',
        );
        $description = fake()->text();
        $entity->update(
            title: 'New title',
            might: 398457934,
            statsSword: 234,
            statsBow: 768,
            statsHorse: 478,
            heroesPayed: 56,
            heroesFree: 486,
            artifacts: 50,
            skins: 30,
            troops: 55,
            description: $description,
        );

        $this->assertEquals('New title', $entity->title);
        $this->assertEquals(398457934, $entity->might);
        $this->assertEquals(234, $entity->statsSword);
        $this->assertEquals(768, $entity->statsBow);
        $this->assertEquals(478, $entity->statsHorse);
        $this->assertEquals(56, $entity->heroesPayed);
        $this->assertEquals(486, $entity->heroesFree);
        $this->assertEquals(30, $entity->skins);
        $this->assertEquals(55, $entity->troops);
        $this->assertEquals(55, $entity->troops);
        $this->assertEquals($description, $entity->description);
    }

    public function test_with_invalid_title_empty()
    {
        $this->expectExceptionMessage("The title field is required");
        new Entity(
            title: '',
            might: 82347528938475,
        );
    }

    public function test_with_invalid_title_shorter()
    {
        $this->expectExceptionMessage("The title must be at least 2 characters.");
        new Entity(
            title: 'T',
            might: 82347528938475,
        );
    }

    public function test_with_invalid_title_too_long()
    {
        $title = Str::random(256);
        $this->expectExceptionMessage("The title must not be greater than 255 characters.");
        new Entity(
            title: $title,
            might: 82347528938475,
        );
    }

    public function test_with_invalid_description_too_short()
    {
        $this->expectExceptionMessage('The description is null or must be greater than 5 characters.');
        new Entity(
            title: fake()->text(),
            might: 82347528938475,
            description: 'T',
        );
    }

    public function test_update_invalid_title_empty()
    {
        $entity = new Entity(
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
        $this->expectExceptionMessage("The title field is required.");
        $entity->update(
            title: '',
            might: 398457934,
            statsSword: 234,
            statsBow: 768,
            statsHorse: 478,
            heroesPayed: 56,
            heroesFree: 486,
            artifacts: 50,
            skins: 30,
            troops: 55
        );
    }

    public function test_update_invalid_title_too_short()
    {
        $entity = new Entity(
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
        );
        $this->expectExceptionMessage("The title must be at least 2 characters.");
        $entity->update(
            title: 'T',
            might: 398457934,
            statsSword: 234,
            statsBow: 768,
            statsHorse: 478,
            heroesPayed: 56,
            heroesFree: 486,
            artifacts: 50,
            skins: 30,
            troops: 55
        );
    }

    public function test_update_invalid_title_too_long()
    {
        $entity = new Entity(
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
        );
        $this->expectExceptionMessage("The title must not be greater than 255 characters.");
        $entity->update(
            title: Str::random(256),
            might: 398457934,
            statsSword: 234,
            statsBow: 768,
            statsHorse: 478,
            heroesPayed: 56,
            heroesFree: 486,
            artifacts: 50,
            skins: 30,
            troops: 55
        );
    }

    public function test_update_invalid_description_too_short()
    {
        $entity = new Entity(
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
            description: 'New description',
        );
        $this->expectExceptionMessage('The description is null or must be greater than 5 characters.');
        $entity->update(
            title: 'Test title',
            might: 398457934,
            statsSword: 234,
            statsBow: 768,
            statsHorse: 478,
            heroesPayed: 56,
            heroesFree: 486,
            artifacts: 50,
            skins: 30,
            troops: 55,
            description: 'T',
        );
    }

}
