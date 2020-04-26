<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class Email
 * @package App\Entities
 */
class Email
{
    /** @var int $emailId */
    private int $emailId;

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
        $this->setEmailId($emailData['emailId']);
        $this->setEmail($emailData['email']);
        $this->setLocalPart($emailData['localPart']);
        $this->setDomainName($emailData['domainName']);
        $this->setDomainExt($emailData['domainExt']);
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $emailData['creationDate']
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $emailData['updateDate']
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
