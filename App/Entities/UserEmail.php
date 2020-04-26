<?php

namespace App\Entities;

use App\Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class Email
 * @package App\Entities
 */
class UserEmail implements EntityInterface
{
    public const LABEL_EMAIL_ID      = 'user_email_id';
    public const LABEL_USER_ID       = 'user_id';
    public const LABEL_EMAIL         = 'email';
    public const LABEL_LOCAL_PART    = 'email_local_part';
    public const LABEL_DOMAIN_NAME   = 'email_domain_name';
    public const LABEL_DOMAIN_EXT    = 'email_domain_ext';
    public const LABEL_EMAIL_ENABLED = 'email_enabled';
    public const LABEL_CREATION_DATE = 'creation_date';
    public const LABEL_UPDATE_DATE   = 'update_date';

    /** @var int $userEmailId */
    private int $userEmailId;

    /** @var int $userId */
    private int $userId;

    /** @var string $email */
    private string $email;

    /** @var string $localPart */
    private string $localPart;

    /** @var string $domainName */
    private string $domainName;

    /** @var string $domainExt */
    private string $domainExt;

    /** @var bool $emailEnabled */
    private bool $emailEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * Email constructor.
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
        $this->setUserEmailId($entityData[self::LABEL_EMAIL_ID]);
        $this->setUserId($entityData[self::LABEL_USER_ID]);
        $this->setEmail($entityData[self::LABEL_EMAIL]);
        $this->setLocalPart($entityData[self::LABEL_LOCAL_PART]);
        $this->setDomainName($entityData[self::LABEL_DOMAIN_NAME]);
        $this->setDomainExt($entityData[self::LABEL_DOMAIN_EXT]);
        $this->setEmailEnabled($entityData[self::LABEL_EMAIL_ENABLED]);
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
    public function getUserEmailId(): int
    {
        return $this->userEmailId;
    }

    /** @param int $userEmailId */
    public function setUserEmailId(int $userEmailId): void
    {
        $this->userEmailId = $userEmailId;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /** @param string $email */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /** @return string */
    public function getLocalPart(): string
    {
        return $this->localPart;
    }

    /** @param string $localPart */
    public function setLocalPart(string $localPart): void
    {
        $this->localPart = $localPart;
    }

    /** @return string */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /** @param string $domainName */
    public function setDomainName(string $domainName): void
    {
        $this->domainName = $domainName;
    }

    /** @return string */
    public function getDomainExt(): string
    {
        return $this->domainExt;
    }

    /** @param string $domainExt */
    public function setDomainExt(string $domainExt): void
    {
        $this->domainExt = $domainExt;
    }

    /** @return bool */
    public function isEmailEnabled(): bool
    {
        return $this->emailEnabled;
    }

    /** @param bool $emailEnabled */
    public function setEmailEnabled(bool $emailEnabled): void
    {
        $this->emailEnabled = $emailEnabled;
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
