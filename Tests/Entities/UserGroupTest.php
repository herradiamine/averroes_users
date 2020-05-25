<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\UserGroup;
use Codeception\Test\Unit;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\Entities\DataProviderTraits\GroupProviderTrait;
use DateTimeImmutable;
use InvalidArgumentException;
use TypeError;

/**
 * Class UserGroupTest
 * @package Tests\Entities
 */
class UserGroupTest extends Unit
{
    use GroupProviderTrait {
        GroupProviderTrait::__construct as availableData;
    }

    public const LABEL_INDEX_REAL        = 'real';
    public const LABEL_INDEX_INVALID_ARG = 'invalid_arg';
    public const LABEL_INDEX_TYPE_ERROR  = 'type_error';
    public const LABEL_INDEX_EMPTY       = 'empty';
    public const LABEL_INDEX_NULL        = 'null';

    /** @var UserGroup|MockObject $mockEntity */
    private MockObject $mockEntity;

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
        $this->mockEntity      = $this->createMock(UserGroup::class);
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
            case self::LABEL_INDEX_REAL:
                $set_user_group_id->with($value)->willReturn(true);
                $get_user_group_id->willReturn($value);

                static::assertTrue($this->mockEntity->setUserGroupId($value));
                static::assertEquals($value, $this->mockEntity->getUserGroupId());

                static::assertTrue($this->userGroupEntity->setUserGroupId($value));
                static::assertEquals($value, $this->userGroupEntity->getUserGroupId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_group_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userGroupEntity->setUserGroupId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserGroupId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_group_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userGroupEntity->setUserGroupId($value);

                $this->expectException(TypeError::class);
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
            case self::LABEL_INDEX_REAL:
                $set_group_name->with($value)->willReturn(true);
                $get_group_name->willReturn($value);

                static::assertTrue($this->userGroupEntity->setGroupName($value));
                static::assertEquals($value, $this->userGroupEntity->getGroupName());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_group_name->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userGroupEntity->setGroupName($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setGroupName($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_group_name->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userGroupEntity->setGroupName($value);

                $this->expectException(TypeError::class);
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
            case self::LABEL_INDEX_REAL:
                $set_group_enabled->with($value);
                $get_group_enabled->willReturn($value);

                $this->userGroupEntity->setGroupEnabled($value);
                static::assertTrue($this->userGroupEntity->isGroupEnabled());

                $this->mockEntity->setGroupEnabled($value);
                static::assertTrue($this->mockEntity->isGroupEnabled());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_group_enabled->with($value);

                $this->expectException(TypeError::class);
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
            case self::LABEL_INDEX_REAL:
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
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_creation_date->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userGroupEntity->setCreationDate($value);

                $this->expectException(TypeError::class);
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
            case self::LABEL_INDEX_REAL:
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userGroupEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userGroupEntity->getUpdateDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getUpdateDate()
                );
                break;
            case self::LABEL_INDEX_NULL:
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userGroupEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertNull($this->userGroupEntity->getUpdateDate());
                static::assertNull($this->mockEntity->getUpdateDate());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_update_date->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userGroupEntity->setUpdateDate($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
