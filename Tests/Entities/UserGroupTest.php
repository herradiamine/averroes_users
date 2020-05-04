<?php

namespace Tests\Entities;

use DateTimeImmutable;
use Entities\UserGroup;
use Tests\Entities\HelpersTraits\AvailableDataTypesTrait;
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
}
