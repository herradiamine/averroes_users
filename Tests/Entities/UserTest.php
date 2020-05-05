<?php

declare(strict_types=1);

namespace Tests\Entities;

use Entities\User;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Constraints\IsDateTimeImmutable;
use Tests\Entities\Traits\AvailableDataTypesTrait;
use TypeError;

/**
 * Class UserTest
 * @package App\Test\Entities
 */
class UserTest extends TestCase
{
    use AvailableDataTypesTrait {
        AvailableDataTypesTrait::__construct as availableData;
    }

    /** @var User $userEntity */
    private User $userEntity;

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
        $this->userEntity = new User();
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
                $this->userEntity->setUserId($value);
                static::assertIsInt($this->userEntity->getUserId());
                break;
            case 'null':
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
                static::expectException(TypeError::class);
                $this->userEntity->setUserId($value);
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
                $this->userEntity->setUserGroupId($value);
                static::assertIsInt($this->userEntity->getUserGroupId());
                break;
            case 'null':
                $this->userEntity->setUserGroupId($value);
                static::assertThat(
                    $this->userEntity->getUserGroupId(),
                    new IsNull()
                );
                break;
            case 'boolean':
            case 'float':
            case 'string':
            case 'array':
            case 'datetime':
                static::expectException(TypeError::class);
                $this->userEntity->setUserGroupId($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserName($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userEntity->setUserName($value);
                static::assertIsString($this->userEntity->getUserName());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEntity->setUserName($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserFirstName($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userEntity->setUserFirstname($value);
                static::assertIsString($this->userEntity->getUserFirstname());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEntity->setUserFirstname($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserLastName($type, $value)
    {
        switch ($type) {
            case 'string':
                $this->userEntity->setUserLastname($value);
                static::assertIsString($this->userEntity->getUserLastname());
                break;
            case 'integer':
            case 'float':
            case 'boolean':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEntity->setUserLastname($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableData
     * @param $type
     * @param $value
     */
    public function testSetUserEnabled($type, $value)
    {
        switch ($type) {
            case 'boolean':
                $this->userEntity->setUserEnabled($value);
                static::assertIsBool($this->userEntity->isUserEnabled());
                break;
            case 'float':
            case 'integer':
            case 'string':
            case 'array':
            case 'datetime':
            case 'null':
                static::expectException(TypeError::class);
                $this->userEntity->setUserEnabled($value);
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
                $this->userEntity->setCreationDate($value);
                static::assertThat(
                    $this->userEntity->getCreationDate(),
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
                $this->userEntity->setCreationDate($value);
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
                $this->userEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userEntity->getUpdateDate(),
                    new IsDateTimeImmutable()
                );
                break;
            case 'null':
                $this->userEntity->setUpdateDate($value);
                static::assertThat(
                    $this->userEntity->getUpdateDate(),
                    new IsNull()
                );
                break;
            case 'boolean':
            case 'integer':
            case 'float':
            case 'string':
            case 'array':
                static::expectException(TypeError::class);
                $this->userEntity->setUpdateDate($value);
                break;
        }
    }

    /** @return array */
    public function setAvailableData()
    {
        return $this->entityData;
    }
}
