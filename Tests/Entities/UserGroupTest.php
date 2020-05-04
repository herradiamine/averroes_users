<?php

namespace Tests\Entities;

use DateTimeImmutable;
use Entities\UserGroup;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\IsNull;
use Tests\Entities\Constraints\IsDateTimeImmutable;
use Tests\Entities\Traits\AvailableDataTypesTrait;
use TypeError;
use PHPUnit\Framework\TestCase;

/**
 * Class UserGroupTest
 * @package Tests\Entities
 */
class UserGroupTest extends TestCase
{
    use AvailableDataTypesTrait {
        AvailableDataTypesTrait::__construct as availableData;
    }

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
        $this->userGroupEntity = new UserGroup();
    }

    public function testSetUserGroupId()
    {
        foreach ($this->entityData as $key => $value) {
            switch ($key) {
                case 'integer':
                    $this->userGroupEntity->setUserGroupId($value);
                    static::assertIsInt($this->userGroupEntity->getUserGroupId());
                    break;
                case 'float':
                case 'string':
                case 'boolean':
                case 'array':
                case 'datetime':
                case 'null':
                    static::expectException(TypeError::class);
                    $this->userGroupEntity->setUserGroupId($value);
                    break;
            }
        }
    }

    public function testSetGroupName()
    {
        foreach ($this->entityData as $key => $value) {
            switch ($key) {
                case 'string':
                    $this->userGroupEntity->setGroupName($value);
                    static::assertIsString($this->userGroupEntity->getGroupName());
                    break;
                case 'integer':
                case 'float':
                case 'boolean':
                case 'array':
                case 'datetime':
                case 'null':
                    static::expectException(TypeError::class);
                    $this->userGroupEntity->setGroupName($value);
                    break;
            }
        }
    }

    public function testSetGroupEnabled()
    {
        foreach ($this->entityData as $key => $value) {
            switch ($key) {
                case 'boolean':
                    $this->userGroupEntity->setGroupEnabled($value);
                    static::assertIsBool($this->userGroupEntity->isGroupEnabled());
                    break;
                case 'integer':
                case 'float':
                case 'string':
                case 'array':
                case 'datetime':
                case 'null':
                    static::expectException(TypeError::class);
                    $this->userGroupEntity->setGroupEnabled($value);
                    break;
            }
        }
    }

    public function testSetCreationDate()
    {
        foreach ($this->entityData as $key => $value) {
            switch ($key) {
                case 'datetime':
                    $this->userGroupEntity->setCreationDate($value);
                    static::assertThat(
                        $this->userGroupEntity->getCreationDate(),
                        new IsDateTimeImmutable()
                    );
                    break;
                case 'boolean':
                case 'integer':
                case 'float':
                case 'string':
                case 'array':
                case 'null':
                    // static::expectException(TypeError::class);
                    // $this->userGroupEntity->setCreationDate($value);
                    break;
            }
        }
    }

    public function testSetUpdateDate()
    {
        foreach ($this->entityData as $key => $value) {
            switch ($key) {
                case 'datetime':
                    $this->userGroupEntity->setUpdateDate($value);
                    static::assertThat(
                        $this->userGroupEntity->getUpdateDate(),
                        new IsDateTimeImmutable()
                    );
                    break;
                case 'null':
                    $this->userGroupEntity->setUpdateDate($value);
                    static::assertThat(
                        $this->userGroupEntity->getUpdateDate(),
                        new IsNull()
                    );
                    break;
                case 'boolean':
                case 'integer':
                case 'float':
                case 'string':
                case 'array':
                    // static::expectException(TypeError::class);
                    // $this->userGroupEntity->setUpdateDate($value);
                    break;
            }
        }
    }
}
