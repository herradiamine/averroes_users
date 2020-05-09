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
        $this->mockEntity = static::createMock(UserPassword::class);
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
            case 'real':
                $set_user_password_id->with($value)->willReturn(true);
                $get_user_password_id->willReturn($value);

                static::assertTrue($this->userPasswordEntity->setUserPasswordId($value));
                static::assertEquals($value, $this->userPasswordEntity->getUserPasswordId());

                static::assertTrue($this->mockEntity->setUserPasswordId($value));
                static::assertEquals($value, $this->mockEntity->getUserPasswordId());
                break;
            case 'invalid_arg':
                $set_user_password_id->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userPasswordEntity->setUserPasswordId($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserPasswordId($value);
                break;
            case 'type_error':
            case 'empty':
                $set_user_password_id->with($value)->willThrowException(new TypeError());
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUserPasswordId($value);

                static::expectException(TypeError::class);
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
            case 'real':
                $set_user_id->with($value)->willReturn(true);
                $get_user_id->willReturn($value);

                static::assertTrue($this->userPasswordEntity->setUserId($value));
                static::assertEquals($value, $this->userPasswordEntity->getUserId());

                static::assertTrue($this->mockEntity->setUserId($value));
                static::assertEquals($value, $this->mockEntity->getUserId());
                break;
            case 'invalid_arg':
                $set_user_id->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userPasswordEntity->setUserId($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserId($value);
                break;
            case 'type_error':
            case 'empty':
                $set_user_id->with($value)->willThrowException(new TypeError());
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUserId($value);

                static::expectException(TypeError::class);
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
            case 'real':
                $set_user_password->with($value)->willReturn(true);
                $get_user_password->willReturn($value);

                static::assertTrue($this->mockEntity->setUserPassword($value));
                static::assertEquals($value, $this->mockEntity->getUserPassword());

                static::assertTrue($this->userPasswordEntity->setUserPassword($value));
                static::assertEquals($value, $this->userPasswordEntity->getUserPassword());
                break;
            case 'invalid_arg':
                $set_user_password->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userPasswordEntity->setUserPassword($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserPassword($value);
                break;
            case 'empty':
            case 'type_error':
                $set_user_password->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUserPassword($value);

                static::expectException(TypeError::class);
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
            case 'real':
                $set_password_enabled->with($value);
                $is_password_enabled->willReturn($value);

                $this->userPasswordEntity->setPasswordEnabled($value);
                static::assertTrue($this->userPasswordEntity->isPasswordEnabled());

                $this->mockEntity->setPasswordEnabled($value);
                static::assertTrue($this->mockEntity->isPasswordEnabled());
                break;
            case 'type_error':
            case 'empty':
                $set_password_enabled->with($value)->willThrowException(new TypeError());
                $is_password_enabled->willReturn(false);

                static::expectException(TypeError::class);
                $this->userPasswordEntity->setPasswordEnabled($value);
                static::assertIsBool($this->userPasswordEntity->isPasswordEnabled());

                static::expectException(TypeError::class);
                $this->mockEntity->setPasswordEnabled($value);
                static::assertIsBool($this->mockEntity->isPasswordEnabled());
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
            case 'type_error':
            case 'empty':
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setCreationDate($value);

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
    public function testSetUpdateData($type, $value)
    {
        $set_update_date = $this->mockEntity->method('setUpdateDate');
        $get_update_date = $this->mockEntity->method('getUpdateDate');
        switch ($type) {
            case 'real':
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
            case 'type_error':
            case 'empty':
                $set_update_date->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUpdateDate($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
