<?php

declare(strict_types=1);

namespace Tests\Entities\DataProviderTraits;

use DateTimeImmutable;
use Tests\Entities\UserEmailTest;

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
    private array $emailEnabled;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userEmailId = [
            [UserEmailTest::LABEL_INDEX_REAL, 39873],
            [UserEmailTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserEmailTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->userId = [
            [UserEmailTest::LABEL_INDEX_REAL, 42765],
            [UserEmailTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, '42765'],
            [UserEmailTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->userEmail = [
            [UserEmailTest::LABEL_INDEX_REAL, 'pierre.dupont@mail.com'],
            [UserEmailTest::LABEL_INDEX_INVALID_ARG, 'pierre.dupont'],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, 98347],
            [UserEmailTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->localPart = [
            [UserEmailTest::LABEL_INDEX_REAL, 'pierre.dupont'],
            [UserEmailTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, 98347],
            [UserEmailTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->domainName = [
            [UserEmailTest::LABEL_INDEX_REAL, 'gmail.com'],
            [UserEmailTest::LABEL_INDEX_INVALID_ARG, '^|fzzeoi.dzoie'],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, 98347],
            [UserEmailTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->emailEnabled = [
            [UserEmailTest::LABEL_INDEX_REAL, true],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, 1],
            [UserEmailTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->creationDate = [
            [UserEmailTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('yesterday'))],
            [UserEmailTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->updateDate = [
            [UserEmailTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            [UserEmailTest::LABEL_INDEX_NULL, null],
            [UserEmailTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('today'))],
            [UserEmailTest::LABEL_INDEX_EMPTY, '']
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
