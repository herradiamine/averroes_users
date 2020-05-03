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

    /**
     * Initiantes entity hydratation.
     * Must have array data to set in entity.
     * @param array $entityData
     */
    public function initEntity(array $entityData): void;
}
