<?php

declare(strict_types=1);

namespace Tests\Entities\DataProviderTraits;

use DateTimeImmutable;
use Tests\Entities\UserTest;

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
            [UserTest::LABEL_INDEX_REAL, 39873],
            [UserTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->userGroupId = [
            [UserTest::LABEL_INDEX_REAL, 39873],
            [UserTest::LABEL_INDEX_NULL, null],
            [UserTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->userName = [
            [UserTest::LABEL_INDEX_REAL, 'amineherradi'],
            [UserTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserTest::LABEL_INDEX_TYPE_ERROR, 39873],
            [UserTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->userFirstname = [
            [UserTest::LABEL_INDEX_REAL, 'Amine'],
            [UserTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserTest::LABEL_INDEX_TYPE_ERROR, 39873],
            [UserTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->userLastname = [
            [UserTest::LABEL_INDEX_REAL, 'Herradi'],
            [UserTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserTest::LABEL_INDEX_TYPE_ERROR, 39873],
            [UserTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->userEnabled = [
            [UserTest::LABEL_INDEX_REAL, true],
            [UserTest::LABEL_INDEX_TYPE_ERROR, 1],
            [UserTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->creationDate = [
            [UserTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            [UserTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('tomorrow'))],
            [UserTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->updateDate = [
            [UserTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            [UserTest::LABEL_INDEX_NULL, null],
            [UserTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('now'))],
            [UserTest::LABEL_INDEX_EMPTY, '']
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
