<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;

/**
 * Trait AvailableDataTypes
 */
trait EmailProviderTrait
{
    private array $userEmailId;
    private array $userId;
    private array $userEmail;
    private array $localPart;
    private array $domainName;
    private array $domainExt;
    private array $emailEnabled;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userEmailId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', null]
        ];
        $this->userId = [
            ['real', 42765],
            ['invalid_arg', 0],
            ['type_error', '42765'],
            ['empty', null]
        ];
        $this->userEmail = [
            ['real', 'pierre.dupont@mail.com'],
            ['invalid_arg', 'pierre.dupont'],
            ['type_error', 98347],
            ['empty', '']
        ];
        $this->localPart = [
            ['real', 'pierre.dupont'],
            ['invalid_arg', ''],
            ['type_error', 98347],
            ['empty', '']
        ];
        $this->domainName = [
            ['real', 'gmail.com'],
            ['invalid_arg', '^|fzzeoi.dzoie'],
            ['type_error', 98347],
            ['empty', '']
        ];
        $this->emailEnabled = [
            ['real', true],
            ['type_error', 1],
            ['empty', null]
        ];
        $this->creationDate = [
            ['real', DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            ['type_error', date(DATE_W3C, strtotime('yesterday'))],
            ['empty', null]
        ];
        $this->updateDate = [
            ['real', DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            ['type_error', date(DATE_W3C, strtotime('today'))],
            ['empty', null]
        ];
    }

    /** @return array */
    public function provideUserEmailId()
    {
        return $this->userEmailId;
    }

    /** @return array */
    public function provideUserId()
    {
        return $this->userId;
    }

    /** @return array */
    public function provideUserEmail()
    {
        return $this->userEmail;
    }

    /** @return array */
    public function provideLocalPart()
    {
        return $this->localPart;
    }

    /** @return array */
    public function provideDomainName()
    {
        return $this->domainName;
    }

    /** @return array */
    public function provideEmailEnabled()
    {
        return $this->emailEnabled;
    }

    /** @return array */
    public function provideCreationDate()
    {
        return $this->creationDate;
    }

    /** @return array */
    public function provideUpdateDate()
    {
        return $this->updateDate;
    }
}
