<?php

declare(strict_types=1);

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class Password
 * @package App\Entities
 */
class UserPassword implements EntityInterface
{
    public const TABLE_NAME = 'user_password';

    public const LABEL_USER_PASSWORD_ID = 'user_password_id';
    public const LABEL_USER_ID          = 'user_id';
    public const LABEL_USER_PASSWORD    = 'user_password';
    public const LABEL_PASSWORD_ENABLED = 'password_enabled';
    public const LABEL_CREATION_DATE    = 'creation_date';
    public const LABEL_UPDATE_DATE      = 'update_date';

    /** @var int $userPasswordId */
    private int $userPasswordId;

    /** @var int $userId */
    private int $userId;

    /** @var string $userPassword */
    private string $userPassword;

    /** @var bool $passwordEnabled */
    private bool $passwordEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * Password constructor.
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
    public function getUserPasswordId(): int
    {
        return $this->userPasswordId;
    }

    /** @param int $userPasswordId */
    public function setUserPasswordId(int $userPasswordId): void
    {
        $this->userPasswordId = $userPasswordId;
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
    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    /** @param string $userPassword */
    public function setUserPassword(string $userPassword): void
    {
        $this->userPassword = $userPassword;
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
