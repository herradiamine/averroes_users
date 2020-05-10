<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;

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
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->userId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->userPassword = [
            ['real', 'E0D9U3FDOIJE'],
            ['invalid_arg', ''],
            ['type_error', 39873],
            ['empty', null]
        ];
        $this->passwordEnabled = [
            ['real', true],
            ['type_error', 1],
            ['empty', '']
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
            ['empty', '']
        ];
        $this->updateDate = [
            ['real', DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            ['null', null],
            ['type_error', date(DATE_W3C, strtotime('today'))],
            ['empty', '']
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
