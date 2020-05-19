<?php

declare(strict_types=1);

namespace Tests\Entities;

use DateTimeImmutable;
use Entities\User;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Entities\DataProviderTraits\UserProviderTrait;
use TypeError;

/**
 * Class UserTest
 * @package App\Test\Entities
 */
class UserTest extends TestCase
{
    use UserProviderTrait {
        UserProviderTrait::__construct as availableData;
    }

    public const LABEL_INDEX_REAL        = 'real';
    public const LABEL_INDEX_INVALID_ARG = 'invalid_arg';
    public const LABEL_INDEX_TYPE_ERROR  = 'type_error';
    public const LABEL_INDEX_EMPTY       = 'empty';
    public const LABEL_INDEX_NULL        = 'null';

    /** @var User $userEntity */
    private User $userEntity;

    /** @var User|MockObject $mockEntity */
    private MockObject $mockEntity;

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
        $this->mockEntity = $this->createMock(User::class);
        $this->userEntity = new User();
    }

    /**
     * @dataProvider provideUserId
     * @param $type
     * @param $value
     */
    public function testSetUserId($type, $value)
    {
        $set_user_id = $this->mockEntity->method('setUserId');
        $get_user_id = $this->mockEntity->method('getUserId');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_id->with($value)->willReturn(true);
                $get_user_id->willReturn($value);

                static::assertTrue($this->userEntity->setUserId($value));
                static::assertEquals($value, $this->userEntity->getUserId());

                static::assertTrue($this->mockEntity->setUserId($value));
                static::assertEquals($value, $this->mockEntity->getUserId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userEntity->setUserId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userEntity->setUserId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserId($value);
                break;
        }
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
            case self::LABEL_INDEX_NULL:
                $set_user_group_id->with($value)->willReturn(true);
                $get_user_group_id->willReturn($value);

                static::assertTrue($this->userEntity->setUserGroupId($value));
                static::assertEquals($value, $this->userEntity->getUserGroupId());

                static::assertTrue($this->mockEntity->setUserGroupId($value));
                static::assertEquals($value, $this->mockEntity->getUserGroupId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_group_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userEntity->setUserGroupId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserGroupId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_group_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userEntity->setUserGroupId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserGroupId($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserName
     * @param $type
     * @param $value
     */
    public function testSetUserName($type, $value)
    {
        $set_user_name = $this->mockEntity->method('setUserName');
        $get_user_name = $this->mockEntity->method('getUserName');

        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_name->with($value)->willReturn(true);
                $get_user_name->willReturn($value);

                static::assertTrue($this->userEntity->setUserName($value));
                static::assertEquals($value, $this->userEntity->getUserName());

                static::assertTrue($this->mockEntity->setUserName($value));
                static::assertEquals($value, $this->mockEntity->getUserName());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_name->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userEntity->setUserName($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserName($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_name->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userEntity->setUserName($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserName($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserFirstname
     * @param $type
     * @param $value
     */
    public function testSetUserFirstName($type, $value)
    {
        $set_user_firstname = $this->mockEntity->method('setUserFirstname');
        $get_user_firstname = $this->mockEntity->method('getUserFirstname');

        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_firstname->with($value)->willReturn(true);
                $get_user_firstname->willReturn($value);

                static::assertTrue($this->userEntity->setUserFirstname($value));
                static::assertEquals($value, $this->userEntity->getUserFirstname());

                static::assertTrue($this->mockEntity->setUserFirstname($value));
                static::assertEquals($value, $this->mockEntity->getUserFirstname());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_firstname->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userEntity->setUserFirstname($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserFirstname($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_firstname->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userEntity->setUserFirstname($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserFirstname($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserLastname
     * @param $type
     * @param $value
     */
    public function testSetUserLastName($type, $value)
    {
        $set_user_lastname = $this->mockEntity->method('setUserLastname');
        $get_user_lastname = $this->mockEntity->method('getUserLastname');

        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_lastname->with($value)->willReturn(true);
                $get_user_lastname->willReturn($value);

                static::assertTrue($this->userEntity->setUserLastname($value));
                static::assertEquals($value, $this->userEntity->getUserLastname());

                static::assertTrue($this->mockEntity->setUserLastname($value));
                static::assertEquals($value, $this->mockEntity->getUserLastname());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_lastname->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userEntity->setUserLastname($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserLastname($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_lastname->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userEntity->setUserLastname($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserLastname($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserEnabled
     * @param $type
     * @param $value
     */
    public function testSetUserEnabled($type, $value)
    {
        $set_user_enabled = $this->mockEntity->method('setUserEnabled');
        $is_user_enabled  = $this->mockEntity->method('isUserEnabled');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_enabled->with($value);
                $is_user_enabled->willReturn($value);

                $this->userEntity->setUserEnabled($value);
                static::assertTrue($this->userEntity->isUserEnabled());

                $this->mockEntity->setUserEnabled($value);
                static::assertTrue($this->mockEntity->isUserEnabled());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_enabled->with($value)->willThrowException(new TypeError());
                $is_user_enabled->willReturn(false);

                $this->expectException(TypeError::class);
                $this->userEntity->setUserEnabled($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserEnabled($value);
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

                $this->userEntity->setCreationDate($value);
                $this->mockEntity->setCreationDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userEntity->getCreationDate()
                );
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
                $this->userEntity->setCreationDate($value);

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

                $this->userEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userEntity->getUpdateDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getUpdateDate()
                );
                break;
            case self::LABEL_INDEX_NULL:
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertNull($this->userEntity->getUpdateDate());
                static::assertNull($this->mockEntity->getUpdateDate());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_update_date->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userEntity->setUpdateDate($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
