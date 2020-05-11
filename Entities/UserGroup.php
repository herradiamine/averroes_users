<?php

declare(strict_types=1);

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;
use InvalidArgumentException;
use TypeError;

/**
 * Class UserGroup
 * @package App\Entities
 */
class UserGroup implements EntityInterface
{
    public const TABLE_NAME = 'user_group';

    public const LABEL_USER_GROUP_ID   = 'user_group_id';
    public const LABEL_GROUP_NAME      = 'group_name';
    public const LABEL_GROUP_ENABLED   = 'group_enabled';
    public const LABEL_CREATION_DATE   = 'creation_date';
    public const LABEL_UPDATE_DATE     = 'update_date';

    /** @var int $userGroupId */
    private int $userGroupId;

    /** @var string $groupName */
    private string $groupName;

    /** @var bool $groupEnabled */
    private bool $groupEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserGroup constructor.
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
                case 'setUserGroupId':
                    $value = ($value)? (int) $value : null ;
                    $this->{$method}($value);
                    break;
                case 'setGroupName':
                    $this->{$method}($value);
                    break;
                case 'setGroupEnabled':
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

    /** @return int */
    public function getUserGroupId(): int
    {
        return $this->userGroupId;
    }

    /**
     * @param int $userGroupId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserGroupId(int $userGroupId): bool
    {
        if ($userGroupId) {
            $this->userGroupId = $userGroupId;
            return true;
        } else {
            throw new InvalidArgumentException("$userGroupId is not a valid user group id");
        }
    }

    /** @return string */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setGroupName(string $groupName): bool
    {
        if ($groupName != '') {
            $this->groupName = $groupName;
            return true;
        } else {
            throw new InvalidArgumentException("$groupName is not a valid group name");
        }
    }

    /** @return bool */
    public function isGroupEnabled(): bool
    {
        return $this->groupEnabled;
    }

    /**
     * @param bool $groupEnabled
     * @return void
     * @throws TypeError
     */
    public function setGroupEnabled(bool $groupEnabled): void
    {
        $this->groupEnabled = $groupEnabled;
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
