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
 * Class Email
 * @package App\Entities
 */
class UserEmail implements EntityInterface
{
    use EntityTrait {
        EntityTrait::__set as public;
        EntityTrait::initEntity as public;
    }

    public const TABLE_NAME = 'user_email';

    public const LABEL_EMAIL_ID          = 'user_email_id';
    public const LABEL_USER_ID           = 'user_id';
    public const LABEL_USER_EMAIL        = 'user_email';
    public const LABEL_EMAIL_LOCAL_PART  = 'local_part';
    public const LABEL_EMAIL_DOMAIN_NAME = 'domain_name';
    public const LABEL_EMAIL_DOMAIN_EXT  = 'domain_ext';
    public const LABEL_EMAIL_ENABLED     = 'email_enabled';
    public const LABEL_CREATION_DATE     = 'creation_date';
    public const LABEL_UPDATE_DATE       = 'update_date';

    /** @var int $userEmailId */
    private int $userEmailId;

    /** @var int $userId */
    private int $userId;

    /** @var string $userEmail */
    private string $userEmail;

    /** @var string $localPart */
    private string $localPart;

    /** @var string $domainName */
    private string $domainName;

    /** @var bool $emailEnabled */
    private bool $emailEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * Email constructor.
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function __construct($entityData = [])
    {
        if (!empty($entityData)) {
            $this->initEntity($entityData);
        }
    }

    /** @return int */
    public function getUserEmailId(): int
    {
        return $this->userEmailId;
    }

    /**
     * @param int $userEmailId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserEmailId(int $userEmailId): bool
    {
        if ($userEmailId) {
            $this->userEmailId = $userEmailId;
            return true;
        } else {
            throw new InvalidArgumentException("$userEmailId is not a valid user email id");
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
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserEmail(string $userEmail): bool
    {
        $user_email = filter_var($userEmail, FILTER_VALIDATE_EMAIL);
        if ($user_email) {
            $this->userEmail     = $user_email;
            $exploded_user_email = explode("@", $user_email);

            $this->setLocalPart($exploded_user_email[0]);
            $this->setDomainName($exploded_user_email[1]);
            return true;
        } else {
            throw new InvalidArgumentException("$userEmail is not a valid user email");
        }
    }

    /** @return string */
    public function getLocalPart(): string
    {
        return $this->localPart;
    }

    /**
     * @param string $localPart
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setLocalPart(string $localPart): bool
    {
        if ($localPart != '') {
            $this->localPart = $localPart;
            return true;
        } else {
            throw new InvalidArgumentException("$localPart is not a valid local part");
        }
    }

    /** @return string */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /**
     * @param string $domainName
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setDomainName(string $domainName): bool
    {
        $domain_name = filter_var($domainName, FILTER_VALIDATE_DOMAIN);
        if ($domain_name) {
            $this->domainName = $domainName;
            return true;
        } else {
            throw new InvalidArgumentException("$domainName is not a valid domain name");
        }
    }

    /** @return bool */
    public function isEmailEnabled(): bool
    {
        return $this->emailEnabled;
    }

    /**
     * @param bool $emailEnabled
     * @return void
     * @throws TypeError
     */
    public function setEmailEnabled(bool $emailEnabled = false): void
    {
        $this->emailEnabled = $emailEnabled;
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
