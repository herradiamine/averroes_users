<?php

declare(strict_types=1);

namespace Tests\Entities\DataProviderTraits;

use DateTimeImmutable;
use Tests\Entities\UserPasswordTest;

/**
 * Trait PasswordProviderTrait
 *
 * @package Tests\Entities\Traits
 */
trait PasswordProviderTrait
{
    private array $userPasswordId;
    private array $userId;
    private array $userPassword;
    private array $passwordEnabled;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userPasswordId = [
            [UserPasswordTest::LABEL_INDEX_REAL, 39873],
            [UserPasswordTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserPasswordTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserPasswordTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->userId = [
            [UserPasswordTest::LABEL_INDEX_REAL, 39873],
            [UserPasswordTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserPasswordTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserPasswordTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->userPassword = [
            [UserPasswordTest::LABEL_INDEX_REAL, 'E0D9U3FDOIJE'],
            [UserPasswordTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserPasswordTest::LABEL_INDEX_TYPE_ERROR, 39873],
            [UserPasswordTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->passwordEnabled = [
            [UserPasswordTest::LABEL_INDEX_REAL, true],
            [UserPasswordTest::LABEL_INDEX_TYPE_ERROR, 1],
            [UserPasswordTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->creationDate = [
            [UserPasswordTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            [UserPasswordTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('yesterday'))],
            [UserPasswordTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->updateDate = [
            [UserPasswordTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            [UserPasswordTest::LABEL_INDEX_NULL, null],
            [UserPasswordTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('today'))],
            [UserPasswordTest::LABEL_INDEX_EMPTY, '']
        ];
    }

    /** @return array */
    public function provideUserPasswordId()
    {
        return $this->userPasswordId;
    }

    /** @return array */
    public function provideUserId()
    {
        return $this->userId;
    }

    /** @return array */
    public function provideUserPassword()
    {
        return $this->userPassword;
    }

    /** @return array */
    public function providePasswordEnabled()
    {
        return $this->passwordEnabled;
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
