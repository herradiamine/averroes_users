<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class User
 * @package App\Entities
 */
class User
{
    public const LABEL_USER_ID        = 'userId';
    public const LABEL_USER_GROUP_ID  = 'userGroupId';
    public const LABEL_USER_NAME      = 'userName';
    public const LABEL_USER_FIRSTNAME = 'userFirstName';
    public const LABEL_USER_LASTNAME  = 'userLastName';
    public const LABEL_USER_EMAIL     = 'userEmail';
    public const LABEL_CREATION_DATE  = 'creationDate';
    public const LABEL_UPDATE_DATE    = 'updateDate';

    /** @var int $userId */
    private int $userId;

    /** @var int|null $userGroupId */
    private ?int $userGroupId;

    /** @var string $userName */
    private string $userName;

    /** @var string $userFirstname */
    private string $userFirstname;

    /** @var string $userLastname */
    private string $userLastname;

    /** @var Email $userEmail */
    private Email $userEmail;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * User constructor.
     * @param array $userData
     */
    public function __construct(array $userData = [])
    {
        if (!empty($userData)) {
            $this->initUser($userData);
        }
    }

    /** @param array $userData */
    private function initUser(array $userData): void
    {
        $this->setUserId($userData[self::LABEL_USER_ID]);
        $this->setUserGroupId($userData[self::LABEL_USER_GROUP_ID]);
        $this->setUserName($userData[self::LABEL_USER_NAME]);
        $this->setUserFirstname($userData[self::LABEL_USER_FIRSTNAME]);
        $this->setUserLastname($userData[self::LABEL_USER_LASTNAME]);
        $this->setUserEmail($userData[self::LABEL_USER_EMAIL]);
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $userData[self::LABEL_CREATION_DATE]
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $userData[self::LABEL_UPDATE_DATE]
            )
        );
    }

    /** @return int */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /** @param int $userId */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /** @return int|null */
    public function getUserGroupId(): ?int
    {
        return $this->userGroupId;
    }

    /** @param int|null $userGroupId */
    public function setUserGroupId(int $userGroupId = null): void
    {
        $this->userGroupId = $userGroupId;
    }

    /** @return string */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /** @param string $userName */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /** @return string */
    public function getUserFirstname(): string
    {
        return $this->userFirstname;
    }

    /** @param string $userFirstname */
    public function setUserFirstname(string $userFirstname): void
    {
        $this->userFirstname = $userFirstname;
    }

    /** @return string */
    public function getUserLastname(): string
    {
        return $this->userLastname;
    }

    /** @param string $userLastname */
    public function setUserLastname(string $userLastname): void
    {
        $this->userLastname = $userLastname;
    }

    /** @return Email */
    public function getUserEmail(): Email
    {
        return $this->userEmail;
    }

    /** @param Email $userEmail */
    public function setUserEmail(Email $userEmail): void
    {
        $this->userEmail = $userEmail;
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
