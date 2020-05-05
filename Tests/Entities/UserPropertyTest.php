<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\UserProperty;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Constraints\IsDateTimeImmutable;
use Tests\Entities\Traits\AvailableDataTypesTrait;
use TypeError;

/**
 * Class UserPropertyTest
 * @package Tests\Entities
 */
class UserPropertyTest extends TestCase
{
    use AvailableDataTypesTrait {
        AvailableDataTypesTrait::__construct as availableData;
    }

    /** @var UserProperty $userPropertyEntity */
    private UserProperty $userPropertyEntity;

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
        $this->userPropertyEntity = new UserProperty();
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
                $this->userPropertyEntity->setUserPropertyId($value);
                static::assertIsInt($this->userPropertyEntity->getUserPropertyId());
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPropertyEntity->setUserPropertyId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserGroupId($type, $value)
    {
        switch ($type) {
            case 'integer':
                $this->userPropertyEntity->setUserGroupId($value);
                static::assertIsInt($this->userPropertyEntity->getUserGroupId());
                break;
            case 'null':
                $this->userPropertyEntity->setUserGroupId($value);
                static::assertThat(
                    $this->userPropertyEntity->getUserGroupId(),
                    new IsNull()
                );
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
                static::expectException(TypeError::class);
                $this->userPropertyEntity->setUserGroupId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetPropertyName($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userPropertyEntity->setPropertyName($value);
                static::assertIsString($this->userPropertyEntity->getPropertyName());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPropertyEntity->setPropertyName($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetPropertyType($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userPropertyEntity->setPropertyType($value);
                static::assertIsString($this->userPropertyEntity->getPropertyType());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPropertyEntity->setPropertyType($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetPropertyEnabled($type, $value)
    {
        switch ($type) {
            case 'boolean':
                $this->userPropertyEntity->setPropertyEnabled($value);
                static::assertIsBool($this->userPropertyEntity->isPropertyEnabled());
                break;
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userPropertyEntity->setPropertyEnabled($value);
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
                $this->userPropertyEntity->setCreationDate($value);
                static::assertThat(
                    $this->userPropertyEntity->getCreationDate(),
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
                $this->userPropertyEntity->setCreationDate($value);
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
                $this->userPropertyEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userPropertyEntity->getUpdateDate(),
                    new IsDateTimeImmutable()
                );
                break;
            case 'null':
                $this->userPropertyEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userPropertyEntity->getUpdateDate(),
                    new IsNull()
                );
                break;
            case 'boolean':
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
                static::expectException(TypeError::class);
                $this->userPropertyEntity->setUpdateDate($value);
                break;
        }
    }

    /** @return array */
    public function setAvailableData()
    {
        return $this->entityData;
    }
}
