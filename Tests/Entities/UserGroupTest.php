<?php

namespace Tests\Entities;

use Entities\UserGroup;
use PHPUnit\Framework\TestCase;

/**
 * Class UserGroupTest
 * @package Tests\Entities
 */
class UserGroupTest extends TestCase
{
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

        $entity_data = [
            UserGroup::LABEL_USER_GROUP_ID => 3098452309,
            UserGroup::LABEL_GROUP_NAME    => 'Administrateurs',
            UserGroup::LABEL_GROUP_ENABLED => true,
            UserGroup::LABEL_CREATION_DATE => date(DATE_W3C, strtotime('yesterday')),
            UserGroup::LABEL_UPDATE_DATE   => date(DATE_W3C, strtotime('today')),
        ];
        $this->userGroupEntity = new UserGroup($entity_data);
    }

    public function testSetUserGroupId()
    {
        /** Is an integer */
        static::assertIsInt($this->userGroupEntity->getUserGroupId());
    }

    public function testSetGroupName()
    {
        /** Is a string */
        static::assertIsString($this->userGroupEntity->getGroupName());
    }
}
