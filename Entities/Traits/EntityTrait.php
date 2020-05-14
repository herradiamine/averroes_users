<?php

declare(strict_types=1);

namespace Entities\Traits;

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
     * EntityTrait constructor.
     */
    public function __construct()
    {
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
}
