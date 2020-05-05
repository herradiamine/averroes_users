<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\UserEmail;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Constraints\IsDateTimeImmutable;
use Tests\Entities\Traits\AvailableDataTypesTrait;
use TypeError;

/**
 * Class UserEmailTest
 * @package App\Tests\Entities
 */
class UserEmailTest extends TestCase
{
    use AvailableDataTypesTrait {
        AvailableDataTypesTrait::__construct as availableData;
    }

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
        $this->userEmailEntity = new UserEmail();
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserEmailId($type, $value)
    {
        switch ($type) {
            case 'integer':
                $this->userEmailEntity->setUserEmailId($value);
                static::assertIsInt($this->userEmailEntity->getUserEmailId());
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setUserEmailId($value);
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
                $this->userEmailEntity->setUserId($value);
                static::assertIsInt($this->userEmailEntity->getUserId());
                break;
            case 'null':
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setUserId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserEmail($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userEmailEntity->setUserEmail($value);
                static::assertIsString($this->userEmailEntity->getUserEmail());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setUserEmail($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetLocalPart($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userEmailEntity->setLocalPart($value);
                static::assertIsString($this->userEmailEntity->getLocalPart());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setLocalPart($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetDomainName($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userEmailEntity->setDomainName($value);
                static::assertIsString($this->userEmailEntity->getDomainName());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setDomainName($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetDomainExt($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userEmailEntity->setDomainExt($value);
                static::assertIsString($this->userEmailEntity->getDomainExt());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setDomainExt($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetEmailEnabled($type, $value)
    {
        switch ($type) {
            case 'boolean':
                $this->userEmailEntity->setEmailEnabled($value);
                static::assertIsBool($this->userEmailEntity->isEmailEnabled());
                break;
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setEmailEnabled($value);
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
                $this->userEmailEntity->setCreationDate($value);
                static::assertThat(
                    $this->userEmailEntity->getCreationDate(),
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
                $this->userEmailEntity->setCreationDate($value);
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
                $this->userEmailEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userEmailEntity->getUpdateDate(),
                    new IsDateTimeImmutable()
                );
                break;
            case 'null':
                $this->userEmailEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userEmailEntity->getUpdateDate(),
                    new IsNull()
                );
                break;
            case 'boolean':
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
                static::expectException(TypeError::class);
                $this->userEmailEntity->setUpdateDate($value);
                break;
        }
    }

    /** @return array */
    public function setAvailableData()
    {
        return $this->entityData;
    }
}
