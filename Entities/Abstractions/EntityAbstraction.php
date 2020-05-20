<?php

declare(strict_types=1);

namespace Entities\Abstractions;

use Entities\Exceptions\InvalidArgument as InvalidArgumentException;
use Entities\Exceptions\UndefinedProperty;
use Entities\Helpers\EntityHelper;
use DateTimeImmutable;
use ReflectionClass;
use ReflectionException;
use TypeError;

/**
 * Trait EntityTrait
 * @package Entities
 * @codeCoverageIgnore
 */
abstract class EntityAbstraction
{
    protected const LABEL_TYPE_BOOL   = 'bool';
    protected const LABEL_TYPE_STRING = 'string';
    protected const LABEL_TYPE_ARRAY  = 'array';
    protected const LABEL_TYPE_INT    = 'int';
    protected const LABEL_TYPE_FLOAT  = 'float';
    protected const LABEL_TYPE_DATETIMEIMMUTABLE = 'DateTimeImmutable';

    /**
     * Entity constructor.
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function __construct($entityData = [])
    {
        if (!empty($entityData)) {
            $this->initEntity($entityData);
        }
    }

    /**
     * Entity setter. Used in PDO fetch modes to map properties with their values in the right type.
     * @param $name
     * @param $value
     * @throws ReflectionException
     * @throws UndefinedProperty
     * @codeCoverageIgnore
     */
    public function __set($name, $value)
    {
        $reflection = new ReflectionClass($this);

        $method_name = EntityHelper::snakeToCamelCase($name, true);
        $get_method  = 'get' . $method_name;
        $is_method   = 'is' . $method_name;
        $set_method  = 'set' . $method_name;

        if ($reflection->hasMethod($get_method)) {
            $method_type = $reflection->getMethod($get_method)->getReturnType()->getName();
        } elseif ($reflection->hasMethod($is_method)) {
            $method_type = $reflection->getMethod($is_method)->getReturnType()->getName();
        } else {
            $name    = EntityHelper::snakeToCamelCase($name, false);
            $message = sprintf(UndefinedProperty::DEFAULT_MESSAGE, $name);
            throw new UndefinedProperty(__METHOD__, $message);
        }

        if ($reflection->hasMethod($set_method)) {
            $value = $this->automatedValueCastAndSet($method_type, $value);
            $this->setMethod($set_method, $value);
        }
    }

    /**
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function initEntity(array $entityData): void
    {
        foreach ($entityData as $key => $value) {
            $set_method = 'set' . EntityHelper::snakeToCamelCase($key, true);
            $this->setMethod($set_method, $value);
        }
    }

    /**
     * @param string $method_type
     * @param mixed  $value
     * @return array|bool|DateTimeImmutable|false|float|int|string|null
     * @codeCoverageIgnore
     */
    private function automatedValueCastAndSet(string $method_type, $value)
    {
        switch ($method_type) {
            case self::LABEL_TYPE_BOOL:
                $value = ($value) ? (bool) $value : null;
                break;
            case self::LABEL_TYPE_ARRAY:
                $value = ($value) ? (array) $value : null;
                break;
            case self::LABEL_TYPE_INT:
                $value = ($value) ? (int) $value : null;
                break;
            case self::LABEL_TYPE_FLOAT:
                $value = ($value) ? (float) $value : null;
                break;
            case self::LABEL_TYPE_DATETIMEIMMUTABLE:
                $value = (
                    $value
                ) ? DateTimeImmutable::createFromFormat(
                    DATE_W3C,
                    date(DATE_W3C, strtotime($value))
                ) : null;
                break;
            case self::LABEL_TYPE_STRING:
            default:
                $value = ($value) ? (string) $value : null;
                break;
        }
        return $value;
    }

    /**
     * Applies a set method after its existence check and cast of its value to the right type.
     * @param string $setMethod
     * @param mixed  $value
     */
    private function setMethod(string $setMethod, $value): void
    {
        try {
            $this->{$setMethod}($value);
        } catch (TypeError $error) {
            echo TypeError::class . ' : ' . $error->getMessage();
        } catch (InvalidArgumentException $exception) {
            echo InvalidArgumentException::class . ' : ' . $exception->getMessage();
        }
    }
}
