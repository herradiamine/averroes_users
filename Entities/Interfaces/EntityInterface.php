<?php

namespace Entities\Interfaces;

/**
 * Interface EntityInterface
 * @package App\Entities\Interfaces
 */
interface EntityInterface
{
    /**
     * EntityInterface constructor.
     * @param array $entityData
     */
    public function __construct(array $entityData = []);

    /** @param array $entityData */
    public function initEntity(array $entityData): void;
}
