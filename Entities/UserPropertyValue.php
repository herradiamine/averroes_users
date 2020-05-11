<?php

declare(strict_types=1);

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;
use InvalidArgumentException;
use TypeError;

/**
 * Class UserPropertyValue
 *
 * @package App\Entities
 */
class UserPropertyValue implements EntityInterface
{
    public const TABLE_NAME = 'user_property_value';

    public const LABEL_USER_PROPERTY_VALUE_ID = 'user_property_value_id';
    public const LABEL_USER_ID                = 'user_id';
    public const LABEL_USER_PROPERTY_ID       = 'user_property_id';
    public const LABEL_CUSTOM_VALUE           = 'custom_value';
    public const LABEL_CREATION_DATE          = 'creation_date';
    public const LABEL_UPDATE_DATE            = 'update_date';

    /** @var int $userPropertyValueId */
    private int $userPropertyValueId;

    /** @var int $userId */
    private int $userId;

    /** @var int $userPropertyId */
    private int $userPropertyId;

    /** @var int|float|bool|string|null $customValue could be anything */
    private $customValue;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserPropertyValue constructor.
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
     * @param array $entityData
     */
    public function initEntity(array $entityData): void
    {
        foreach ($entityData as $key => $value) {
            $method = 'set' . EntityHelper::snakeToCamelCase($key, true);
            $this->{$method}($value);
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
                case 'setUserPropertyValueId':
                case 'setUserId':
                case 'setUserPropertyId':
                    $value = ($value)? (int) $value : null ;
                    $this->{$method}($value);
                    break;
                case 'setCustomValue':
                    $valid_type = (
                        is_int($value)
                        || is_float($value)
                        || is_bool($value)
                        || is_string($value)
                        || is_null($value)
                    );
                    if ($valid_type) {
                        $this->{$method}($value);
                    }
                    break;
                case 'setPropertyEnabled':
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
    public function getUserPropertyValueId(): int
    {
        return $this->userPropertyValueId;
    }

    /**
     * @param int $userPropertyValueId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserPropertyValueId(int $userPropertyValueId): bool
    {
        if ($userPropertyValueId) {
            $this->userPropertyValueId = $userPropertyValueId;
            return true;
        } else {
            throw new InvalidArgumentException("$userPropertyValueId is not a valid user property value id");
        }
    }

    /** @return int */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return true
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

    /** @return int */
    public function getUserPropertyId(): int
    {
        return $this->userPropertyId;
    }

    /**
     * @param int $userPropertyId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserPropertyId(int $userPropertyId): bool
    {
        if ($userPropertyId) {
            $this->userPropertyId = $userPropertyId;
            return true;
        } else {
            throw new InvalidArgumentException("$userPropertyId is not a valid user password id");
        }
    }

    /** @return int|float|bool|string|null */
    public function getCustomValue()
    {
        return $this->customValue;
    }

    /**
     * @param int|float|bool|string|null $customValue
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setCustomValue($customValue): bool
    {
        $valid_type = (
            is_int($customValue)
            || is_float($customValue)
            || is_bool($customValue)
            || is_string($customValue)
            || is_null($customValue)
        );
        if ($valid_type && $customValue != '') {
            $this->customValue = $customValue;
            return true;
        } else {
            throw new InvalidArgumentException(
                json_encode($customValue) . " is not a valid custom value"
            );
        }
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
