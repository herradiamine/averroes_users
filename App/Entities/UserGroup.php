<?php

namespace App\Entities;

use App\Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class UserGroup
 * @package App\Entities
 */
class UserGroup implements EntityInterface
{
    public const LABEL_USER_GROUP_ID   = 'user_group_id';
    public const LABEL_GROUP_NAME      = 'group_name';
    public const LABEL_GROUP_ENABLED   = 'group_enabled';
    public const LABEL_CREATION_DATE   = 'create_date';
    public const LABEL_UPDATE_DATE     = 'update_date';

    /** @var int $userGroupId */
    private int $userGroupId;

    /** @var string $groupName */
    private string $groupName;

    /** @var bool $groupEnabled */
    private bool $groupEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserGroup constructor.
     * @param array $entityData
     */
    public function __construct(array $entityData = [])
    {
        if (!empty($entityData)) {
            $this->initEntity($entityData);
        }
    }

    /** @param array $entityData */
    public function initEntity(array $entityData): void
    {
        $this->setUserGroupId($entityData[self::LABEL_USER_GROUP_ID]);
        $this->setGroupName($entityData[self::LABEL_GROUP_NAME]);
        $this->setGroupEnabled($entityData[self::LABEL_GROUP_ENABLED]);
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $entityData[self::LABEL_CREATION_DATE]
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $entityData[self::LABEL_UPDATE_DATE]
            )
        );
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
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /** @param string $groupName */
    public function setGroupName(string $groupName): void
    {
        $this->groupName = $groupName;
    }

    /** @return bool */
    public function isGroupEnabled(): bool
    {
        return $this->groupEnabled;
    }

    /** @param bool $groupEnabled */
    public function setGroupEnabled(bool $groupEnabled): void
    {
        $this->groupEnabled = $groupEnabled;
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
