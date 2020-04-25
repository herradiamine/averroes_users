<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class User
 * @package App\Entities
 */
class User
{
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
        $this->setUserId($userData['id']);
        $this->setUserGroupId($userData['groupId']);
        $this->setUserName($userData['name']);
        $this->setUserFirstname($userData['firstName']);
        $this->setUserLastname($userData['lastName']);
        $this->setUserEmail(
            new Email($userData['email'])
        );
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $userData['creationDate']
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $userData['updateDate']
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
