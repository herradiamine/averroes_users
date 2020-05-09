<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\UserGroup;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Traits\GroupProviderTrait;
use DateTimeImmutable;
use InvalidArgumentException;
use TypeError;

/**
 * Class UserGroupTest
 * @package Tests\Entities
 */
class UserGroupTest extends TestCase
{
    use GroupProviderTrait {
        GroupProviderTrait::__construct as availableData;
    }

    /** @var UserGroup|MockObject $mockEntity */
    private ?MockObject $mockEntity;

    /** @var UserGroup $userGroupEntity */
    private UserGroup $userGroupEntity;

    /**
     * @param string|null $name
     * @param array       $data
     * @param int|string  $dataName
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->availableData();
        $this->mockEntity      = static::createMock(UserGroup::class);
        $this->userGroupEntity = new UserGroup();
    }

    /**
     * @dataProvider provideUserGroupId
     * @param $type
     * @param $value
     */
    public function testSetUserGroupId($type, $value)
    {
        $set_user_group_id = $this->mockEntity->method('setUserGroupId');
        $get_user_group_id = $this->mockEntity->method('getUserGroupId');
        switch ($type) {
            case 'real':
                $set_user_group_id->with($value)->willReturn(true);
                $get_user_group_id->willReturn($value);

                static::assertTrue($this->mockEntity->setUserGroupId($value));
                static::assertEquals($value, $this->mockEntity->getUserGroupId());

                static::assertTrue($this->userGroupEntity->setUserGroupId($value));
                static::assertEquals($value, $this->userGroupEntity->getUserGroupId());
                break;
            case 'invalid_arg':
                $set_user_group_id->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userGroupEntity->setUserGroupId($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserGroupId($value);
                break;
            case 'type_error':
            case 'empty':
                $set_user_group_id->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userGroupEntity->setUserGroupId($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setUserGroupId($value);
                break;
        }
    }

    /**
     * @dataProvider provideGroupName
     * @param $type
     * @param $value
     */
    public function testSetGroupName($type, $value)
    {
        $set_group_name = $this->mockEntity->method('setGroupName');
        $get_group_name = $this->mockEntity->method('getGroupName');
        switch ($type) {
            case 'real':
                $set_group_name->with($value)->willReturn(true);
                $get_group_name->willReturn($value);

                static::assertTrue($this->userGroupEntity->setGroupName($value));
                static::assertEquals($value, $this->userGroupEntity->getGroupName());
                break;
            case 'invalid_arg':
                $set_group_name->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userGroupEntity->setGroupName($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setGroupName($value);
                break;
            case 'type_error':
            case 'empty':
                $set_group_name->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userGroupEntity->setGroupName($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setGroupName($value);
                break;
        }
    }

    /**
     * @dataProvider provideGroupEnabled
     * @param $type
     * @param $value
     */
    public function testSetGroupEnabled($type, $value)
    {
        $set_group_enabled = $this->mockEntity->method('setGroupEnabled');
        $get_group_enabled = $this->mockEntity->method('isGroupEnabled');

        switch ($type) {
            case 'real':
                $set_group_enabled->with($value);
                $get_group_enabled->willReturn($value);

                $this->userGroupEntity->setGroupEnabled($value);
                static::assertTrue($this->userGroupEntity->isGroupEnabled());

                $this->mockEntity->setGroupEnabled($value);
                static::assertTrue($this->mockEntity->isGroupEnabled());
                break;
            case 'type_error':
            case 'empty':
                $set_group_enabled->with($value);

                static::expectException(TypeError::class);
                $this->userGroupEntity->setGroupEnabled($value);
                break;
        }
    }

    /**
     * @dataProvider provideCreationDate
     * @param $type
     * @param $value
     */
    public function testSetCreationDate($type, $value)
    {
        $set_creation_date = $this->mockEntity->method('setCreationDate');
        $get_creation_date = $this->mockEntity->method('getCreationDate');
        switch ($type) {
            case 'real':
                $set_creation_date->with($value);
                $get_creation_date->willReturn($value);

                $this->userGroupEntity->setCreationDate($value);
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userGroupEntity->getCreationDate()
                );

                $this->mockEntity->setCreationDate($value);
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getCreationDate()
                );
                break;
            case 'type_error':
            case 'empty':
                $set_creation_date->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userGroupEntity->setCreationDate($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setCreationDate($value);
                break;
        }
    }

    /**
     * @dataProvider provideUpdateDate
     * @param $type
     * @param $value
     */
    public function testSetUpdateDate($type, $value)
    {
        $set_update_date = $this->mockEntity->method('setUpdateDate');
        $get_update_date = $this->mockEntity->method('getUpdateDate');
        switch ($type) {
            case 'real':
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userGroupEntity->setUpdateDate($value);
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userGroupEntity->getUpdateDate()
                );

                $this->mockEntity->setUpdateDate($value);
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getUpdateDate()
                );
                break;
            case 'null':
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userGroupEntity->setUpdateDate($value);
                static::assertNull($this->userGroupEntity->getUpdateDate());

                $this->mockEntity->setUpdateDate($value);
                static::assertNull($this->mockEntity->getUpdateDate());
                break;
            case 'type_error':
            case 'empty':
                $set_update_date->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userGroupEntity->setUpdateDate($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
