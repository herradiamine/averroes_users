<?php

declare(strict_types=1);

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use Entities\Exceptions\InvalidArgument as InvalidArgumentException;
use DateTimeImmutable;
use TypeError;

/**
 * Class User
 * @package App\Entities
 */
class User implements EntityInterface
{
    public const TABLE_NAME = 'user';

    public const LABEL_USER_ID        = 'user_id';
    public const LABEL_USER_GROUP_ID  = 'user_group_id';
    public const LABEL_USER_NAME      = 'user_name';
    public const LABEL_USER_FIRSTNAME = 'user_firstname';
    public const LABEL_USER_LASTNAME  = 'user_lastname';
    public const LABEL_USER_ENABLED   = 'user_enabled';
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

    /** @var bool $userEnabled */
    private bool $userEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * User constructor.
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function __construct(array $entityData = [])
    {
        if (!empty($entityData)) {
            $this->initEntity($entityData);
        }
    }

    /**
     * @codeCoverageIgnore
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $method = 'set' . EntityHelper::snakeToCamelCase($name, true);
        try {
            switch ($method) {
                case 'setUserId':
                case 'setUserGroupId':
                    $value = ($value) ? (int) $value : null ;
                    $this->{$method}($value);
                    break;
                case 'setUserName':
                case 'setUserFirstname':
                case 'setUserLastname':
                    $this->{$method}($value);
                    break;
                case 'setUserEnabled':
                    $value = (bool) $value;
                    $this->{$method}($value);
                    break;
                case 'setCreationDate':
                case 'setUpdateDate':
                    if ($value) {
                        $value = DateTimeImmutable::createFromFormat(
                            DATE_W3C,
                            date(DATE_W3C, strtotime($value))
                        );
                    } else {
                        $value = null;
                    }
                    $this->{$method}($value);
                    break;
            }
        } catch (TypeError $error) {
            echo TypeError::class . ' : ' . $error->getMessage();
        } catch (InvalidArgumentException $exception) {
            echo InvalidArgumentException::class . ' : ' . $exception->getMessage();
        }
    }

    /**
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function initEntity(array $entityData): void
    {
        foreach ($entityData as $key => $value) {
            $method = 'set' . EntityHelper::snakeToCamelCase($key, true);
            try {
                $this->{$method}($value);
            } catch (TypeError $error) {
                echo TypeError::class . ' : ' . $error->getMessage();
            } catch (InvalidArgumentException $exception) {
                echo InvalidArgumentException::class . ' : ' . $exception->getMessage();
            }
        }
    }

    /** @return int */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return bool
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserId(int $userId): bool
    {
        if ($userId) {
            $this->userId = $userId;
            return true;
        } else {
            throw new InvalidArgumentException("$userId is not a valid user id");
        }
    }

    /** @return int|null */
    public function getUserGroupId(): ?int
    {
        return $this->userGroupId;
    }

    /**
     * @param int|null $userGroupId
     * @return bool
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserGroupId(int $userGroupId = null): bool
    {
        if ($userGroupId || is_null($userGroupId)) {
            $this->userGroupId = $userGroupId;
            return true;
        } else {
            throw new InvalidArgumentException("$userGroupId is not a valid user group id");
        }
    }

    /** @return string */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserName(string $userName): bool
    {
        if ($userName != '') {
            $this->userName = $userName;
            return true;
        } else {
            throw new InvalidArgumentException("$userName is not a valid user name");
        }
    }

    /** @return string */
    public function getUserFirstname(): string
    {
        return $this->userFirstname;
    }

    /**
     * @param string $userFirstname
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserFirstname(string $userFirstname): bool
    {
        if ($userFirstname != '') {
            $this->userFirstname = $userFirstname;
            return true;
        } else {
            throw new InvalidArgumentException("$userFirstname is not a valid user firstname");
        }
    }

    /** @return string */
    public function getUserLastname(): string
    {
        return $this->userLastname;
    }

    /**
     * @param string $userLastname
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserLastname(string $userLastname): bool
    {
        if ($userLastname != '') {
            $this->userLastname = $userLastname;
            return true;
        } else {
            throw new InvalidArgumentException("$userLastname is not a valid user firstname");
        }
    }

    /** @return bool */
    public function isUserEnabled(): bool
    {
        return $this->userEnabled;
    }

    /**
     * @param bool $userEnabled
     * @return void
     * @throws TypeError
     */
    public function setUserEnabled(bool $userEnabled = false): void
    {
        $this->userEnabled = $userEnabled;
    }

    /** @return DateTimeImmutable */
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    /**
     * @param DateTimeImmutable $creationDate
     * @return void
     * @throws TypeError
     */
    public function setCreationDate(DateTimeImmutable $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /** @return DateTimeImmutable|null */
    public function getUpdateDate(): ?DateTimeImmutable
    {
        return $this->updateDate;
    }

    /**
     * @param DateTimeImmutable|null $updateDate
     * @return void
     * @throws TypeError
     */
    public function setUpdateDate(?DateTimeImmutable $updateDate = null): void
    {
        $this->updateDate = $updateDate;
    }
}
