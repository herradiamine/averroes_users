<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class User
 * @package App\Entities
 */
class User
{
    public const LABEL_USER_ID        = 'user_id';
    public const LABEL_USER_GROUP_ID  = 'user_group_id';
    public const LABEL_USER_NAME      = 'user_name';
    public const LABEL_USER_FIRSTNAME = 'user_firstname';
    public const LABEL_USER_LASTNAME  = 'user_lastname';
    public const LABEL_USER_EMAIL     = 'user_email';
    public const LABEL_USER_PASSWORD  = 'user_password';
    public const LABEL_CREATION_DATE  = 'creation_date';
    public const LABEL_UPDATE_DATE    = 'update_date';

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

    /** @var Password $userPassword */
    private Password $userPassword;

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
        $this->setUserPassword($userData[self::LABEL_USER_PASSWORD]);
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

    /** @return Password */
    public function getUserPassword(): Password
    {
        return $this->userPassword;
    }

    /** @param Password $userPassword */
    public function setUserPassword(Password $userPassword): void
    {
        $this->userPassword = $userPassword;
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
