<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class UserGroup
 * @package App\Entities
 */
class UserGroup
{
    private int $userGroupId;
    private string $userGroupName;
    private DateTimeImmutable $creationDate;
    private DateTimeImmutable $updateDate;

    /**
     * UserGroup constructor.
     * @param array $userGroup
     */
    public function __construct(array $userGroup = [])
    {

    }

    /** @return int */
    public function getUserGroupId(): int
    {
        return $this->userGroupId;
    }

    /** @param int $userGroupId */
    public function setUserGroupId(int $userGroupId): void
    {
        $this->userGroupId = $userGroupId;
    }

    /** @return string */
    public function getUserGroupName(): string
    {
        return $this->userGroupName;
    }

    /** @param string $userGroupName */
    public function setUserGroupName(string $userGroupName): void
    {
        $this->userGroupName = $userGroupName;
    }

    /** @return DateTimeImmutable */
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    /** @param DateTimeImmutable $creationDate */
    public function setCreationDate(DateTimeImmutable $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /** @return DateTimeImmutable */
    public function getUpdateDate(): DateTimeImmutable
    {
        return $this->updateDate;
    }

    /** @param DateTimeImmutable $updateDate */
    public function setUpdateDate(DateTimeImmutable $updateDate): void
    {
        $this->updateDate = $updateDate;
    }
}