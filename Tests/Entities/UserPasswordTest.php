<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\UserPassword;
use Tests\Entities\Traits\PasswordProviderTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use InvalidArgumentException;
use TypeError;

/**
 * Class UserPasswordTest
 * @package Tests\Entities
 */
class UserPasswordTest extends TestCase
{
    use PasswordProviderTrait {
        PasswordProviderTrait::__construct as availableData;
    }

    public const LABEL_INDEX_REAL        = 'real';
    public const LABEL_INDEX_INVALID_ARG = 'invalid_arg';
    public const LABEL_INDEX_TYPE_ERROR  = 'type_error';
    public const LABEL_INDEX_EMPTY       = 'empty';
    public const LABEL_INDEX_NULL        = 'null';

    /** @var UserPassword $userPasswordEntity */
    private UserPassword $userPasswordEntity;

    /** @var UserPassword|MockObject $mockEntity */
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
        $this->mockEntity = $this->createMock(UserPassword::class);
        $this->userPasswordEntity = new UserPassword();
    }

    /**
     * @dataProvider provideUserPasswordId
     * @param $type
     * @param $value
     */
    public function testSetUserPasswordId($type, $value)
    {
        $set_user_password_id = $this->mockEntity->method('setUserPasswordId');
        $get_user_password_id = $this->mockEntity->method('getUserPasswordId');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_password_id->with($value)->willReturn(true);
                $get_user_password_id->willReturn($value);

                static::assertTrue($this->userPasswordEntity->setUserPasswordId($value));
                static::assertEquals($value, $this->userPasswordEntity->getUserPasswordId());

                static::assertTrue($this->mockEntity->setUserPasswordId($value));
                static::assertEquals($value, $this->mockEntity->getUserPasswordId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_password_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPasswordEntity->setUserPasswordId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserPasswordId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_password_id->with($value)->willThrowException(new TypeError());
                $this->expectException(TypeError::class);
                $this->userPasswordEntity->setUserPasswordId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserPasswordId($value);
                break;
        }
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

                static::assertTrue($this->userPasswordEntity->setUserId($value));
                static::assertEquals($value, $this->userPasswordEntity->getUserId());

                static::assertTrue($this->mockEntity->setUserId($value));
                static::assertEquals($value, $this->mockEntity->getUserId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPasswordEntity->setUserId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_id->with($value)->willThrowException(new TypeError());
                $this->expectException(TypeError::class);
                $this->userPasswordEntity->setUserId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserId($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserPassword
     * @param $type
     * @param $value
     */
    public function testSetUserPassword($type, $value)
    {
        $set_user_password = $this->mockEntity->method('setUserPassword');
        $get_user_password = $this->mockEntity->method('getUserPassword');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_password->with($value)->willReturn(true);
                $get_user_password->willReturn($value);

                static::assertTrue($this->mockEntity->setUserPassword($value));
                static::assertEquals($value, $this->mockEntity->getUserPassword());

                static::assertTrue($this->userPasswordEntity->setUserPassword($value));
                static::assertEquals($value, $this->userPasswordEntity->getUserPassword());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_password->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPasswordEntity->setUserPassword($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserPassword($value);
                break;
            case self::LABEL_INDEX_EMPTY:
            case self::LABEL_INDEX_TYPE_ERROR:
            default:
                $set_user_password->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPasswordEntity->setUserPassword($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserPassword($value);
                break;
        }
    }

    /**
     * @dataProvider providePasswordEnabled
     * @param $type
     * @param $value
     */
    public function testSetPasswordEnabled($type, $value)
    {
        $set_password_enabled = $this->mockEntity->method('setPasswordEnabled');
        $is_password_enabled  = $this->mockEntity->method('isPasswordEnabled');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_password_enabled->with($value);
                $is_password_enabled->willReturn($value);

                $this->userPasswordEntity->setPasswordEnabled($value);
                static::assertTrue($this->userPasswordEntity->isPasswordEnabled());

                $this->mockEntity->setPasswordEnabled($value);
                static::assertTrue($this->mockEntity->isPasswordEnabled());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_password_enabled->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPasswordEntity->setPasswordEnabled($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setPasswordEnabled($value);
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

                $this->userPasswordEntity->setCreationDate($value);
                $this->mockEntity->setCreationDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userPasswordEntity->getCreationDate()
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
                $this->userPasswordEntity->setCreationDate($value);

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
    public function testSetUpdateData($type, $value)
    {
        $set_update_date = $this->mockEntity->method('setUpdateDate');
        $get_update_date = $this->mockEntity->method('getUpdateDate');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userPasswordEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userPasswordEntity->getUpdateDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getUpdateDate()
                );
                break;
            case 'null':
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userPasswordEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertNull($this->userPasswordEntity->getUpdateDate());
                static::assertNull($this->mockEntity->getUpdateDate());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_update_date->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPasswordEntity->setUpdateDate($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
