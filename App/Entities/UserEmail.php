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
    public const LABEL_EMAIL_ID      = 'emailId';
    public const LABEL_USER_ID       = 'userId';
    public const LABEL_EMAIL         = 'email';
    public const LABEL_LOCAL_PART    = 'localPart';
    public const LABEL_DOMAIN_NAME   = 'domainName';
    public const LABEL_DOMAIN_EXT    = 'domainExt';
    public const LABEL_CREATION_DATE = 'creationDate';
    public const LABEL_UPDATE_DATE   = 'updateDate';

    /** @var int $emailId */
    private int $emailId;

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
        $this->setEmailId($entityData[self::LABEL_EMAIL_ID]);
        $this->setUserId($entityData[self::LABEL_USER_ID]);
        $this->setEmail($entityData[self::LABEL_EMAIL]);
        $this->setLocalPart($entityData[self::LABEL_LOCAL_PART]);
        $this->setDomainName($entityData[self::LABEL_DOMAIN_NAME]);
        $this->setDomainExt($entityData[self::LABEL_DOMAIN_EXT]);
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
    public function getEmailId(): int
    {
        return $this->emailId;
    }

    /** @param int $emailId */
    public function setEmailId(int $emailId): void
    {
        $this->emailId = $emailId;
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
