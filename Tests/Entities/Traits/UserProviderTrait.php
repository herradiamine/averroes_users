<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;

/**
 * Trait UserProviderTrait
 *
 * @package Tests\Entities\Traits
 */
trait UserProviderTrait
{
    private array $userId;
    private array $userGroupId;
    private array $userName;
    private array $userFirstname;
    private array $userLastname;
    private array $userEnabled;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->userGroupId = [
            ['real', 39873],
            ['null', null],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->userName = [
            ['real', 'amineherradi'],
            ['invalid_arg', ''],
            ['type_error', 39873],
            ['empty', null]
        ];
        $this->userFirstname = [
            ['real', 'Amine'],
            ['invalid_arg', ''],
            ['type_error', 39873],
            ['empty', null]
        ];
        $this->userLastname = [
            ['real', 'Herradi'],
            ['invalid_arg', ''],
            ['type_error', 39873],
            ['empty', null]
        ];
        $this->userEnabled = [
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
            ['type_error', date(DATE_W3C, strtotime('tomorrow'))],
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
            ['type_error', date(DATE_W3C, strtotime('now'))],
            ['empty', '']
        ];
    }

    /** @return array */
    public function provideUserId()
    {
        return $this->userId;
    }

    /** @return array */
    public function provideUserGroupId()
    {
        return $this->userGroupId;
    }

    /** @return array */
    public function provideUserName()
    {
        return $this->userName;
    }

    /** @return array */
    public function provideUserFirstname()
    {
        return $this->userFirstname;
    }

    /** @return array */
    public function provideUserLastname()
    {
        return $this->userLastname;
    }

    /** @return array */
    public function provideUserEnabled()
    {
        return $this->userEnabled;
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
