<?php

namespace App\Entities;

use App\Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class Password
 * @package App\Entities
 */
class UserPassword implements EntityInterface
{
    public const LABEL_PASSWORD_ID      = 'password_id';
    public const LABEL_USER_ID          = 'user_id';
    public const LABEL_PASSWORD         = 'password';
    public const LABEL_PASSWORD_ENABLED = 'password_enabled';
    public const LABEL_CREATION_DATE    = 'creation_date';
    public const LABEL_UPDATE_DATE      = 'update_date';

    /** @var int $passwordId */
    private int $passwordId;

    /** @var int $userId */
    private int $userId;

    /** @var string $password */
    private string $password;

    /** @var bool $passwordEnabled */
    private bool $passwordEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * Password constructor.
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
        $this->setPasswordId($entityData[self::LABEL_PASSWORD_ID]);
        $this->setUserId($entityData[self::LABEL_USER_ID]);
        $this->setPassword($entityData[self::LABEL_PASSWORD]);
        $this->setPasswordEnabled($entityData[self::LABEL_PASSWORD_ENABLED]);
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
    public function getPasswordId(): int
    {
        return $this->passwordId;
    }

    /** @param int $passwordId */
    public function setPasswordId(int $passwordId): void
    {
        $this->passwordId = $passwordId;
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

    /** @return string */
    public function getPassword(): string
    {
        return $this->password;
    }

    /** @param string $password */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /** @return bool */
    public function isPasswordEnabled(): bool
    {
        return $this->passwordEnabled;
    }

    /** @param bool $passwordEnabled */
    public function setPasswordEnabled(bool $passwordEnabled): void
    {
        $this->passwordEnabled = $passwordEnabled;
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
