<?php

declare(strict_types=1);

namespace Tests\Entities;

use DateTimeImmutable;
use Entities\UserEmail;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Traits\EmailProviderTrait;
use TypeError;

/**
 * Class UserEmailTest
 * @package App\Tests\Entities
 */
class UserEmailTest extends TestCase
{
    use EmailProviderTrait {
        EmailProviderTrait::__construct as availableData;
    }

    /** @var UserEmail|MockObject $mockEntity */
    private ?MockObject $mockEntity;

    /** @var UserEmail $userEmailEntity */
    private UserEmail $userEmailEntity;

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
        $this->mockEntity      = static::createMock(UserEmail::class);
        $this->userEmailEntity = new UserEmail();
    }

    /**
     * @dataProvider provideUserEmailId
     * @param $type
     * @param $value
     */
    public function testSetUserEmailId($type, $value)
    {
        $set_user_email_id = $this->mockEntity->method('setUserEmailId');
        $get_user_email_id = $this->mockEntity->method('getUserEmailId');
        switch ($type) {
            case 'real':
                $set_user_email_id->with($value)->willReturn(true);
                $get_user_email_id->willReturn($value);

                static::assertTrue($this->userEmailEntity->setUserEmailId($value));
                static::assertEquals($value, $this->userEmailEntity->getUserEmailId());

                static::assertTrue($this->mockEntity->setUserEmailId($value));
                static::assertEquals($value, $this->mockEntity->getUserEmailId());
                break;
            case 'invalid_arg':
                $set_user_email_id->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userEmailEntity->setUserEmailId($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserEmailId($value);
                break;
            case 'type_error':
            case 'empty':
                $set_user_email_id->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userEmailEntity->setUserEmailId($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setUserEmailId($value);
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

                static::assertTrue($this->userEmailEntity->setUserId($value));
                static::assertEquals($value, $this->userEmailEntity->getUserId());

                static::assertTrue($this->mockEntity->setUserId($value));
                static::assertEquals($value, $this->mockEntity->getUserId());
                break;
            case 'invalid_arg':
                $set_user_id->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userEmailEntity->setUserId($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserId($value);
                break;
            case 'type_error':
            case 'empty':
                $set_user_id->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userEmailEntity->setUserId($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setUserId($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserEmail
     * @param $type
     * @param $value
     */
    public function testSetUserEmail($type, $value)
    {
        $set_user_email = $this->mockEntity->method('setUserEmail');
        $get_user_email = $this->mockEntity->method('getUserEmail');
        switch ($type) {
            case 'real':
                $set_user_email->with($value)->willReturn(true);
                $get_user_email->willReturn($value);

                static::assertTrue($this->mockEntity->setUserEmail($value));
                static::assertEquals($value, $this->mockEntity->getUserEmail());

                static::assertTrue($this->userEmailEntity->setUserEmail($value));
                static::assertEquals($value, $this->userEmailEntity->getUserEmail());
                break;
            case 'invalid_arg':
            case 'empty':
                $set_user_email->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userEmailEntity->setUserEmail($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserEmail($value);
                break;
            case 'type_error':
                $set_user_email->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userEmailEntity->setUserEmail($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setUserEmail($value);
                break;
        }
    }

    /**
     * @dataProvider provideLocalPart
     * @param $type
     * @param $value
     */
    public function testSetLocalPart($type, $value)
    {
        $set_local_part = $this->mockEntity->method('setLocalPart');
        $get_local_part = $this->mockEntity->method('getLocalPart');
        switch ($type) {
            case 'real':
                $set_local_part->with($value)->willReturn(true);
                $get_local_part->willReturn($value);

                static::assertTrue($this->mockEntity->setLocalPart($value));
                static::assertEquals($value, $this->mockEntity->getLocalPart());

                static::assertTrue($this->userEmailEntity->setLocalPart($value));
                static::assertEquals($value, $this->userEmailEntity->getLocalPart());
                break;
            case 'invalid_arg':
            case 'empty':
                $set_local_part->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userEmailEntity->setLocalPart($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setLocalPart($value);
                break;
            case 'type_error':
                $set_local_part->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userEmailEntity->setLocalPart($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setLocalPart($value);
                break;
        }
    }

    /**
     * @dataProvider provideDomainName
     * @param $type
     * @param $value
     */
    public function testSetDomainName($type, $value)
    {
        $set_domain_name = $this->mockEntity->method('setDomainName');
        $get_domain_name = $this->mockEntity->method('getDomainName');
        switch ($type) {
            case 'real':
                $set_domain_name->with($value)->willReturn(true);
                $get_domain_name->willReturn($value);

                static::assertTrue($this->mockEntity->setDomainName($value));
                static::assertEquals($value, $this->mockEntity->getDomainName());

                static::assertTrue($this->userEmailEntity->setDomainName($value));
                static::assertEquals($value, $this->userEmailEntity->getDomainName());
                break;
            case 'invalid_arg':
            case 'empty':
                $set_domain_name->with($value)->willThrowException(new InvalidArgumentException());

                static::expectException(InvalidArgumentException::class);
                $this->userEmailEntity->setDomainName($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setDomainName($value);
                break;
            case 'type_error':
                $set_domain_name->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userEmailEntity->setDomainName($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setDomainName($value);
                break;
        }
    }

    /**
     * @dataProvider provideEmailEnabled
     * @param $type
     * @param $value
     */
    public function testSetEmailEnabled($type, $value)
    {
        $set_email_enabled = $this->mockEntity->method('setEmailEnabled');
        $is_email_enabled  = $this->mockEntity->method('isEmailEnabled');
        switch ($type) {
            case 'real':
                $set_email_enabled->with($value);
                $is_email_enabled->willReturn(true);

                $this->userEmailEntity->setEmailEnabled($value);
                static::assertTrue($this->userEmailEntity->isEmailEnabled());

                $this->mockEntity->setEmailEnabled($value);
                static::assertTrue($this->mockEntity->isEmailEnabled());
                break;
            case 'type_error':
            case 'empty':
                $set_email_enabled->with($value)->willThrowException(new TypeError());
                $is_email_enabled->willReturn(false);

                static::expectException(TypeError::class);
                $this->userEmailEntity->setEmailEnabled($value);
                static::assertIsBool($this->userEmailEntity->isEmailEnabled());

                static::expectException(TypeError::class);
                $this->mockEntity->setEmailEnabled($value);
                static::assertIsBool($this->mockEntity->isEmailEnabled());
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

                $this->userEmailEntity->setCreationDate($value);
                $this->mockEntity->setCreationDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userEmailEntity->getCreationDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getCreationDate()
                );
                break;
            case 'type_error':
            case 'empty':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setCreationDate($value);

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

                $this->userEmailEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userEmailEntity->getUpdateDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getUpdateDate()
                );
                break;
            case 'empty':
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userEmailEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertNull($this->userEmailEntity->getUpdateDate());
                static::assertNull($this->mockEntity->getUpdateDate());
                break;
            case 'type_error':
                $set_update_date->with($value)->willThrowException(new TypeError());

                static::expectException(TypeError::class);
                $this->userEmailEntity->setUpdateDate($value);

                static::expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
