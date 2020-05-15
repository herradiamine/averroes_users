<?php

declare(strict_types=1);

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use Entities\Exceptions\InvalidArgument as InvalidArgumentException;
use DateTimeImmutable;
use Entities\Traits\EntityTrait;
use TypeError;

/**
 * Class UserGroup
 * @package App\Entities
 */
class UserGroup implements EntityInterface
{
    use EntityTrait {
        EntityTrait::__set as public;
        EntityTrait::initEntity as public;
    }

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

    /** @return int */
    public function getUserGroupId(): int
    {
        return $this->userGroupId;
    }

    /**
     * @param int $userGroupId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserGroupId(int $userGroupId): bool
    {
        if ($userGroupId) {
            $this->userGroupId = $userGroupId;
            return true;
        } else {
            throw new InvalidArgumentException("$userGroupId is not a valid user group id");
        }
    }

    /** @return string */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setGroupName(string $groupName): bool
    {
        if ($groupName != '') {
            $this->groupName = $groupName;
            return true;
        } else {
            throw new InvalidArgumentException("$groupName is not a valid group name");
        }
    }

    /** @return bool */
    public function isGroupEnabled(): bool
    {
        return $this->groupEnabled;
    }

    /**
     * @param bool $groupEnabled
     * @return void
     * @throws TypeError
     */
    public function setGroupEnabled(bool $groupEnabled): void
    {
        $this->groupEnabled = $groupEnabled;
    }

    /** @return DateTimeImmutable */
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    /**
     * @param DateTimeImmutable $creationDate
     * @return void
     * @throws TypeError
     */
    public function setCreationDate(DateTimeImmutable $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /** @return DateTimeImmutable|null */
    public function getUpdateDate(): ?DateTimeImmutable
    {
        return $this->updateDate;
    }

    /**
     * @param DateTimeImmutable|null $updateDate
     * @return void
     * @throws TypeError
     */
    public function setUpdateDate(?DateTimeImmutable $updateDate = null): void
    {
        $this->updateDate = $updateDate;
    }
}
