<?php

declare(strict_types=1);

namespace Entities;

use Entities\Traits\EntityTrait;
use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use Entities\Exceptions\InvalidArgument as InvalidArgumentException;
use DateTimeImmutable;
use TypeError;

/**
 * Class Password
 * @package App\Entities
 */
class UserPassword implements EntityInterface
{
    use EntityTrait {
        EntityTrait::__set as public;
        EntityTrait::initEntity as public;
    }

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

    /** @return int */
    public function getUserPasswordId(): int
    {
        return $this->userPasswordId;
    }

    /**
     * @param int $userPasswordId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserPasswordId(int $userPasswordId): bool
    {
        if ($userPasswordId) {
            $this->userPasswordId = $userPasswordId;
            return true;
        } else {
            throw new InvalidArgumentException("$userPasswordId is not a valid user password id");
        }
    }

    /** @return int */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserId(int $userId): bool
    {
        if ($userId) {
            $this->userId = $userId;
            return true;
        } else {
            throw new InvalidArgumentException("$userId is not a valid user id");
        }
    }

    /** @return string */
    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    /**
     * @param string $userPassword
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserPassword(string $userPassword): bool
    {
        if ($userPassword != '') {
            $this->userPassword = $userPassword;
            return true;
        } else {
            throw new InvalidArgumentException("$userPassword is not a valid user password");
        }
    }

    /** @return bool */
    public function isPasswordEnabled(): bool
    {
        return $this->passwordEnabled;
    }

    /**
     * @param bool $passwordEnabled
     * @return void
     * @throws TypeError
     */
    public function setPasswordEnabled(bool $passwordEnabled): void
    {
        $this->passwordEnabled = $passwordEnabled;
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
