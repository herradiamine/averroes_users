<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\UserPassword;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\TestCase;
use Tests\Constraints\IsDateTimeImmutable;
use Tests\Entities\Traits\EmailProviderTrait;
use TypeError;

/**
 * Class UserPasswordTest
 * @package Tests\Entities
 */
class UserPasswordTest extends TestCase
{
    use EmailProviderTrait {
        EmailProviderTrait::__construct as availableData;
    }

    /** @var UserPassword $userPasswordEntity */
    private UserPassword $userPasswordEntity;

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
        $this->userPasswordEntity = new UserPassword();
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserPasswordId($type, $value)
    {
        switch ($type) {
            case 'integer':
                $this->userPasswordEntity->setUserPasswordId($value);
                static::assertIsInt($this->userPasswordEntity->getUserPasswordId());
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUserPasswordId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserId($type, $value)
    {
        switch ($type) {
            case 'integer':
                $this->userPasswordEntity->setUserId($value);
                static::assertIsInt($this->userPasswordEntity->getUserId());
                break;
            case 'null':
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUserId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserPassword($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userPasswordEntity->setUserPassword($value);
                static::assertIsString($this->userPasswordEntity->getUserPassword());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUserPassword($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetPasswordEnabled($type, $value)
    {
        switch ($type) {
            case 'boolean':
                $this->userPasswordEntity->setPasswordEnabled($value);
                static::assertIsBool($this->userPasswordEntity->isPasswordEnabled());
                break;
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setPasswordEnabled($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetCreationDate($type, $value)
    {
        switch ($type) {
            case 'datetime':
                $this->userPasswordEntity->setCreationDate($value);
                static::assertThat(
                    $this->userPasswordEntity->getCreationDate(),
                    new IsDateTimeImmutable()
                );
                break;
            case 'boolean':
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setCreationDate($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUpdateData($type, $value)
    {
        switch ($type) {
            case 'datetime':
                $this->userPasswordEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userPasswordEntity->getUpdateDate(),
                    new IsDateTimeImmutable()
                );
                break;
            case 'null':
                $this->userPasswordEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userPasswordEntity->getUpdateDate(),
                    new IsNull()
                );
                break;
            case 'boolean':
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
                static::expectException(TypeError::class);
                $this->userPasswordEntity->setUpdateDate($value);
                break;
        }
    }

    /** @return array */
    public function setAvailableData()
    {
        return $this->entityData;
    }
}
