<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class UserPropertyValue
 * @package App\Entities
 */
class UserPropertyValue
{
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
        $this->setUserPropertyValueId($propertyValueData['userPropertyValueId']);
        $this->setUserId($propertyValueData['userId']);
        $this->setUserPropertyId($propertyValueData['userPropertyId']);
        $this->setCustomValue($propertyValueData['customValue']);
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $propertyValueData['creationDate']
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $propertyValueData['updateDate']
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
