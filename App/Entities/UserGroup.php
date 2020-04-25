<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class UserGroup
 * @package App\Entities
 */
class UserGroup
{
    /** @var int $userGroupId */
    private int $userGroupId;

    /** @var string $userGroupName */
    private string $userGroupName;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserGroup constructor.
     * @param array $userGroupData
     */
    public function __construct(array $userGroupData = [])
    {
        if (!empty($userGroupData)) {
            $this->initUserGroup($userGroupData);
        }
    }

    /** @param array $userGroupData */
    private function initUserGroup(array $userGroupData): void
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

    /** @return DateTimeImmutable|null */
    public function getUpdateDate(): ?DateTimeImmutable
    {
        return $this->updateDate;
    }

    /** @param DateTimeImmutable|null $updateDate */
    public function setUpdateDate(DateTimeImmutable $updateDate = null): void
    {
        $this->updateDate = $updateDate;
    }
}
