<?php

namespace App\Entities;

use App\Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class UserProperty
 * @package App\Entities
 */
class UserProperty implements EntityInterface
{
    public const LABEL_USER_PROPERTY_ID = 'userPropertyId';
    public const LABEL_USER_GROUP_ID    = 'userGroupId';
    public const LABEL_NAME             = 'name';
    public const LABEL_TYPE             = 'type';
    public const LABEL_ENABLED          = 'enabled';
    public const LABEL_CREATION_DATE    = 'creationDate';
    public const LABEL_UPDATE_DATE      = 'updateDate';

    /** @var int $userPropertyId */
    private int $userPropertyId;

    /** @var int|null $userGroupId */
    private ?int $userGroupId;

    /** @var string $name */
    private string $name;

    /** @var string $type */
    private string $type;

    /** @var bool $enabled */
    private bool $enabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserProperty constructor.
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
        $this->setUserPropertyId($entityData[self::LABEL_USER_PROPERTY_ID]);
        $this->setUserGroupId($entityData[self::LABEL_USER_GROUP_ID]);
        $this->setName($entityData[self::LABEL_NAME]);
        $this->setType($entityData[self::LABEL_TYPE]);
        $this->setEnabled($entityData[self::LABEL_ENABLED]);
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
    public function getUserPropertyId(): int
    {
        return $this->userPropertyId;
    }

    /** @param int $userPropertyId */
    public function setUserPropertyId(int $userPropertyId): void
    {
        $this->userPropertyId = $userPropertyId;
    }

    /** @return int|null */
    public function getUserGroupId(): ?int
    {
        return $this->userGroupId;
    }

    /** @param int|null $userGroupId */
    public function setUserGroupId(int $userGroupId = null): void
    {
        $this->userGroupId = $userGroupId;
    }

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /** @return string */
    public function getType(): string
    {
        return $this->type;
    }

    /** @param string $type */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /** @return bool */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /** @param bool $enabled */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
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
