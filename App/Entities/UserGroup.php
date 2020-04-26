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
    public const LABEL_USER_GROUP_ID   = 'userGroupId';
    public const LABEL_USER_GROUP_NAME = 'userGroupName';
    public const LABEL_CREATION_DATE   = 'creationDate';
    public const LABEL_UPDATE_DATE     = 'updateDate';

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
        $this->setUserGroupName($entityData[self::LABEL_USER_GROUP_NAME]);
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
