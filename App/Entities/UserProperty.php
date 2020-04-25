<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class UserProperty
 * @package App\Entities
 */
class UserProperty
{
    /** @var int $userPropertyId */
    private int $userPropertyId;

    /** @var int|null $userId */
    private ?int $userId;

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
     * @param array $userProperty
     */
    public function __construct(array $userProperty = [])
    {

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
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /** @param int|null $userId */
    public function setUserId(int $userId = null): void
    {
        $this->userId = $userId;
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

    /** @param DateTimeImmutable $updateDate */
    public function setUpdateDate(DateTimeImmutable $updateDate = null): void
    {
        $this->updateDate = $updateDate;
    }
}