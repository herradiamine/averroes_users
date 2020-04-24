<?php

namespace App\Entities;

/**
 * Class Email
 * @package App\Entities
 */
class Email
{
    /** @var string $email */
    private string $email;
    /** @var string $localPart */
    private string $localPart;
    /** @var string $domainName */
    private string $domainName;
    /** @var string $domainExtension */
    private string $domainExtension;

    /**
     * Email constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {

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
    public function getDomainExtension(): string
    {
        return $this->domainExtension;
    }

    /** @param string $domainExtension */
    public function setDomainExtension(string $domainExtension): void
    {
        $this->domainExtension = $domainExtension;
    }
}