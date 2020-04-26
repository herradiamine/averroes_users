<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class UserPropertyValue
 * @package App\Entities
 */
class UserPropertyValue
{
    public const LABEL_USER_PROPERTY_VALUE_ID = 'userPropertyValueId';
    public const LABEL_USER_ID                = 'userId';
    public const LABEL_USER_PROPERTY_ID       = 'userPropertyId';
    public const LABEL_CUSTOM_VALUE           = 'customValue';
    public const LABEL_CREATION_DATE          = 'creationDate';
    public const LABEL_UPDATE_DATE            = 'updateDate';

    /** @property int $userPropertyValueId */
    private int $userPropertyValueId;

    /** @property int $userId */
    private int $userId;

    /** @property int $userPropertyId */
    private int $userPropertyId;

    /** @property int|string|bool|array|null $customValue could be anything */
    private ?int $customValue;

    /** @property DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @property DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserPropertyValue constructor.
     * @param array $propertyValueData
     */
    public function __construct(array $propertyValueData = [])
    {
        if (!empty($propertyValueData)) {
            $this->initUserPropertyValue($propertyValueData);
        }
    }

    /** @param array $propertyValueData */
    private function initUserPropertyValue(array $propertyValueData): void
    {
        $this->setUserPropertyValueId($propertyValueData[self::LABEL_USER_PROPERTY_VALUE_ID]);
        $this->setUserId($propertyValueData[self::LABEL_USER_ID]);
        $this->setUserPropertyId($propertyValueData[self::LABEL_USER_PROPERTY_ID]);
        $this->setCustomValue($propertyValueData[self::LABEL_CUSTOM_VALUE]);
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $propertyValueData[self::LABEL_CREATION_DATE]
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $propertyValueData[self::LABEL_UPDATE_DATE]
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
