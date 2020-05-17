<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;
use Tests\Entities\UserGroupTest;

/**
 * Trait GroupProviderTrait
 *
 * @package Tests\Entities\Traits
 */
trait GroupProviderTrait
{
    private array $userGroupId;
    private array $groupName;
    private array $groupEnabled;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userGroupId = [
            [UserGroupTest::LABEL_INDEX_REAL, 39873],
            [UserGroupTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserGroupTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserGroupTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->groupName = [
            [UserGroupTest::LABEL_INDEX_REAL, 'GROUP_NAME'],
            [UserGroupTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserGroupTest::LABEL_INDEX_TYPE_ERROR, 39873],
            [UserGroupTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->groupEnabled = [
            [UserGroupTest::LABEL_INDEX_REAL, true],
            [UserGroupTest::LABEL_INDEX_TYPE_ERROR, 1],
            [UserGroupTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->creationDate = [
            [UserGroupTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            [UserGroupTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('yesterday'))],
            [UserGroupTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->updateDate = [
            [UserGroupTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            [UserGroupTest::LABEL_INDEX_NULL, null],
            [UserGroupTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('today'))],
            [UserGroupTest::LABEL_INDEX_EMPTY, '']
        ];
    }

    /** @return array */
    public function provideUserGroupId()
    {
        return $this->userGroupId;
    }

    /** @return array */
    public function provideGroupName()
    {
        return $this->groupName;
    }

    /** @return array */
    public function provideGroupEnabled()
    {
        return $this->groupEnabled;
    }

    /** @return array */
    public function provideCreationDate()
    {
        return $this->creationDate;
    }

    /** @return array */
    public function provideUpdateDate()
    {
        return $this->updateDate;
    }
}
