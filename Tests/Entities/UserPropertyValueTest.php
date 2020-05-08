<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\UserPropertyValue;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\TestCase;
use Tests\Constraints\IsDateTimeImmutable;
use Tests\Entities\Traits\AvailableDataTypesTrait;
use TypeError;

/**
 * Class UserPropertyValueTest
 * @package Tests\Entities
 */
class UserPropertyValueTest extends TestCase
{
    use AvailableDataTypesTrait {
        AvailableDataTypesTrait::__construct as availableData;
    }

    /** @var UserPropertyValue $userPropertyValueEntity */
    private UserPropertyValue $userPropertyValueEntity;

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
        $this->userPropertyValueEntity = new UserPropertyValue();
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserPropertyValueId($type, $value)
    {
        switch ($type) {
            case 'integer':
                $this->userPropertyValueEntity->setUserPropertyValueId($value);
                static::assertIsInt($this->userPropertyValueEntity->getUserPropertyValueId());
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPropertyValueEntity->setUserPropertyValueId($value);
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
                $this->userPropertyValueEntity->setUserId($value);
                static::assertIsInt($this->userPropertyValueEntity->getUserId());
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPropertyValueEntity->setUserId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserPropertyId($type, $value)
    {
        switch ($type) {
            case 'integer':
                $this->userPropertyValueEntity->setUserPropertyId($value);
                static::assertIsInt($this->userPropertyValueEntity->getUserPropertyId());
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPropertyValueEntity->setUserPropertyId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetCustomValue($type, $value)
    {
        switch ($type) {
            case 'integer':
            case 'float':
            case 'boolean':
            case 'string':
            case 'null':
                $this->userPropertyValueEntity->setCustomValue((string) $value);
                static::assertIsString($this->userPropertyValueEntity->getCustomValue());
                break;
            case 'array':
            case 'datetime':
                static::expectException(TypeError::class);
                $this->userPropertyValueEntity->setUserPropertyId($value);
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
                $this->userPropertyValueEntity->setCreationDate($value);
                static::assertThat(
                    $this->userPropertyValueEntity->getCreationDate(),
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
                $this->userPropertyValueEntity->setCreationDate($value);
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
                $this->userPropertyValueEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userPropertyValueEntity->getUpdateDate(),
                    new IsDateTimeImmutable()
                );
                break;
            case 'null':
                $this->userPropertyValueEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userPropertyValueEntity->getUpdateDate(),
                    new IsNull()
                );
                break;
            case 'boolean':
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
                static::expectException(TypeError::class);
                $this->userPropertyValueEntity->setUpdateDate($value);
                break;
        }
    }

    /** @return array */
    public function setAvailableData()
    {
        return $this->entityData;
    }
}
