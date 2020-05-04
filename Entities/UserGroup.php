<?php

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class UserGroup
 * @package App\Entities
 */
class UserGroup implements EntityInterface
{
    public const TABLE_NAME = 'user_group';

    public const LABEL_USER_GROUP_ID   = 'user_group_id';
    public const LABEL_GROUP_NAME      = 'group_name';
    public const LABEL_GROUP_ENABLED   = 'group_enabled';
    public const LABEL_CREATION_DATE   = 'creation_date';
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
     * @codeCoverageIgnore
     */
    public function __construct(array $entityData = [])
    {
        if (!empty($entityData)) {
            $this->initEntity($entityData);
        }
    }

    /**
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function initEntity(array $entityData): void
    {
        foreach ($entityData as $key => $value) {
            $method = 'set' . EntityHelper::snakeToCamelCase($key, true);
            $this->{$method}($value);
        }
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
