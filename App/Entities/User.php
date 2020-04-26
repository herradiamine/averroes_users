<?php

namespace App\Entities;

use App\Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class User
 * @package App\Entities
 */
class User implements EntityInterface
{
    public const LABEL_USER_ID        = 'user_id';
    public const LABEL_USER_GROUP_ID  = 'user_group_id';
    public const LABEL_USER_NAME      = 'user_name';
    public const LABEL_USER_FIRSTNAME = 'user_firstname';
    public const LABEL_USER_LASTNAME  = 'user_lastname';
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

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * User constructor.
     * @param array $entityData
     */
    public function __construct(array $entityData = [])
    {
        if (!empty($entityData)) {
            $this->initEntity($entityData);
        }
    }

    /** @param array $entityData */
    public function initEntity(array $entityData): void
    {
        $this->setUserId($entityData[self::LABEL_USER_ID]);
        $this->setUserGroupId($entityData[self::LABEL_USER_GROUP_ID]);
        $this->setUserName($entityData[self::LABEL_USER_NAME]);
        $this->setUserFirstname($entityData[self::LABEL_USER_FIRSTNAME]);
        $this->setUserLastname($entityData[self::LABEL_USER_LASTNAME]);
        $this->setCreationDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $entityData[self::LABEL_CREATION_DATE]
            )
        );
        $this->setUpdateDate(
            DateTimeImmutable::createFromFormat(
                DATE_W3C,
                $entityData[self::LABEL_UPDATE_DATE]
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
