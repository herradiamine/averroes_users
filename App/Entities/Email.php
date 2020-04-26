<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class Email
 * @package App\Entities
 */
class Email
{
    public const LABEL_EMAIL_ID      = 'emailId';
    public const LABEL_EMAIL         = 'email';
    public const LABEL_LOCAL_PART    = 'localPart';
    public const LABEL_DOMAIN_NAME   = 'domainName';
    public const LABEL_DOMAIN_EXT    = 'domainExt';
    public const LABEL_CREATION_DATE = 'creationDate';
    public const LABEL_UPDATE_DATE   = 'updateDate';

    /** @property int $emailId */
    private int $emailId;

    /** @property string $email */
    private string $email;

    /** @property string $localPart */
    private string $localPart;

    /** @property string $domainName */
    private string $domainName;

    /** @property string $domainExt */
    private string $domainExt;

    /** @property DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @property DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * Email constructor.
     * @param array $emailData
     */
    public function __construct(array $emailData = [])
    {
        if (!empty($emailData)) {
            $this->initEmail($emailData);
        }
    }

    /** @param array $emailData */
    private function initEmail(array $emailData): void
    {
        $this->setEmailId($emailData[self::LABEL_EMAIL_ID]);
        $this->setEmail($emailData[self::LABEL_EMAIL]);
        $this->setLocalPart($emailData[self::LABEL_LOCAL_PART]);
        $this->setDomainName($emailData[self::LABEL_DOMAIN_NAME]);
        $this->setDomainExt($emailData[self::LABEL_DOMAIN_EXT]);
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $emailData[self::LABEL_CREATION_DATE]
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $emailData[self::LABEL_UPDATE_DATE]
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
