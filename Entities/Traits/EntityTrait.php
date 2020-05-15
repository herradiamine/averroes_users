<?php

declare(strict_types=1);

namespace Entities\Traits;

use DateTimeImmutable;
use Entities\Exceptions\InvalidArgument as InvalidArgumentException;
use Entities\Helpers\EntityHelper;
use TypeError;

/**
 * Trait EntityTrait
 * @package Entities
 */
trait EntityTrait
{
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
                case 'setUserEmailId':
                case 'setUserPropertyId':
                case 'setGroupId':
                case 'setUserId':
                case 'setUserGroupId':
                case 'setUserPasswordId':
                case 'setUserPropertyValueId':
                    $value = ($value) ? (int) $value : null ;
                    $this->{$method}($value);
                    break;
                case 'setPropertyEnabled':
                case 'setUserEnabled':
                case 'setPasswordEnabled':
                case 'setGroupEnabled':
                case 'setEmailEnabled':
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
                default:
                    $this->{$method}($value);
                    break;
            }
        } catch (TypeError $error) {
            echo TypeError::class . ' : ' . $error->getMessage();
        } catch (InvalidArgumentException $exception) {
            echo InvalidArgumentException::class . ' : ' . $exception->getMessage();
        }
    }
}
