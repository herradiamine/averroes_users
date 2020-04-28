<?php

namespace Entities;

use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class UserProperty
 * @package App\Entities
 */
class UserProperty implements EntityInterface
{
    public const LABEL_USER_PROPERTY_ID = 'user_property_id';
    public const LABEL_USER_GROUP_ID    = 'user_group_id';
    public const LABEL_PROPERTY_NAME    = 'property_name';
    public const LABEL_PROPERTY_TYPE    = 'property_type';
    public const LABEL_PROPERTY_ENABLED = 'property_enabled';
    public const LABEL_CREATION_DATE    = 'creation_date';
    public const LABEL_UPDATE_DATE      = 'update_date';

    /** @var int $userPropertyId */
    private int $userPropertyId;

    /** @var int|null $userGroupId */
    private ?int $userGroupId;

    /** @var string $propertyName */
    private string $propertyName;

    /** @var string $propertyType */
    private string $propertyType;

    /** @var bool $propertyEnabled */
    private bool $propertyEnabled;

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
        $this->setPropertyName($entityData[self::LABEL_PROPERTY_NAME]);
        $this->setPropertyType($entityData[self::LABEL_PROPERTY_TYPE]);
        $this->setPropertyEnabled($entityData[self::LABEL_PROPERTY_ENABLED]);
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
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /** @param string $propertyName */
    public function setPropertyName(string $propertyName): void
    {
        $this->propertyName = $propertyName;
    }

    /** @return string */
    public function getPropertyType(): string
    {
        return $this->propertyType;
    }

    /** @param string $propertyType */
    public function setPropertyType(string $propertyType): void
    {
        $this->propertyType = $propertyType;
    }

    /** @return bool */
    public function isPropertyEnabled(): bool
    {
        return $this->propertyEnabled;
    }

    /** @param bool $propertyEnabled */
    public function setPropertyEnabled(bool $propertyEnabled): void
    {
        $this->propertyEnabled = $propertyEnabled;
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
