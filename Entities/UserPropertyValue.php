<?php

namespace Entities;

use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class UserPropertyValue
 * @package App\Entities
 */
class UserPropertyValue implements EntityInterface
{
    public const LABEL_USER_PROPERTY_VALUE_ID = 'user_property_value_id';
    public const LABEL_USER_ID                = 'user_id';
    public const LABEL_USER_PROPERTY_ID       = 'user_property_id';
    public const LABEL_CUSTOM_VALUE           = 'custom_value';
    public const LABEL_CREATION_DATE          = 'creation_date';
    public const LABEL_UPDATE_DATE            = 'update_date';

    /** @var int $userPropertyValueId */
    private int $userPropertyValueId;

    /** @var int $userId */
    private int $userId;

    /** @var int $userPropertyId */
    private int $userPropertyId;

    /** @var int|string|bool|array|null $customValue could be anything */
    private ?int $customValue;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserPropertyValue constructor.
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
        $this->setUserPropertyValueId($entityData[self::LABEL_USER_PROPERTY_VALUE_ID]);
        $this->setUserId($entityData[self::LABEL_USER_ID]);
        $this->setUserPropertyId($entityData[self::LABEL_USER_PROPERTY_ID]);
        $this->setCustomValue($entityData[self::LABEL_CUSTOM_VALUE]);
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
    public function getUserPropertyValueId(): int
    {
        return $this->userPropertyValueId;
    }

    /** @param int $userPropertyValueId */
    public function setUserPropertyValueId(int $userPropertyValueId): void
    {
        $this->userPropertyValueId = $userPropertyValueId;
    }

    /** @return int */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /** @param int $userId */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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

    /** @return array|bool|int|string|null */
    public function getCustomValue()
    {
        return $this->customValue;
    }

    /** @param array|bool|int|string|null $customValue */
    public function setCustomValue($customValue): void
    {
        $this->customValue = $customValue;
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
    public function setUpdateDate(?DateTimeImmutable $updateDate): void
    {
        $this->updateDate = $updateDate;
    }
}
