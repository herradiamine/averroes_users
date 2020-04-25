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

    /** @var DateTimeImmutable $updateDate */
    private DateTimeImmutable $updateDate;

    /**
     * Email constructor.
     * @param array $email
     */
    public function __construct(array $email = [])
    {
        if (!empty($user)) {
            $this->initEmailEntity($email);
        }
    }

    private function initEmailEntity(array $emailData): void
    {

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

    /** @return DateTimeImmutable */
    public function getUpdateDate(): DateTimeImmutable
    {
        return $this->updateDate;
    }

    /** @param DateTimeImmutable $updateDate */
    public function setUpdateDate(DateTimeImmutable $updateDate): void
    {
        $this->updateDate = $updateDate;
    }
}