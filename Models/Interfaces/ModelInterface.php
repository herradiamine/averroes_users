<?php

declare(strict_types=1);

namespace Models\Interfaces;

use Generator;
use Models\Exceptions\ModelException;

/**
 * Interface ModelInterface
 * @package Models\Interfaces
 */
interface ModelInterface
{
    /**
     * Gets many elements using select by many ids and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array  $ids
     * @param array  $displayFiedls
     * @param int    $limit
     * @param int    $offset
     * @return Generator
     * @throws ModelException
     */
    public function getOneOrManyByIds(
        array $ids,
        array $displayFiedls = ['*'],
        int $limit = 20,
        int $offset = 0
    ): Generator;

    /**
     * Gets all stored elements.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array  $displayFields
     * @param int    $limit
     * @param int    $offset
     * @return Generator
     * @throws ModelException
     */
    public function getAll(
        array $displayFields = ['*'],
        int $limit = 20,
        int $offset = 0
    ): Generator;

    /**
     * Inserts one element, must have data to be inserted and respect every fields data types rules.
     * Returns the inserted element id.
     * @param array  $data
     * @return int
     * @throws ModelException
     */
    public function insertOne(
        array $data
    ): int;

    /**
     * Inserts many elements at once, must have one or many datas to be inserted
     * and respect every fields data types rules.
     * Returns the inserted elements ids in an array.
     * @param array  $datas
     * @return bool
     * @throws ModelException
     */
    public function insertMany(
        array $datas
    ): bool;

    /**
     * Updates many elements by their ids, must have array of elements ids to be updated and datas to replace.
     * Must respect all fields data types rules.
     * Returns array that contains boolean in front of each elements ids that has been updated or not.
     * @param array  $ids
     * @param array  $data
     * @return true
     * @throws ModelException
     */
    public function updateOneOrManyByIds(
        array $ids,
        array $data
    ): bool;

    /**
     * Deletes many elements by ids, must have array of ids elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array  $ids
     * @return bool
     * @throws ModelException
     */
    public function deleteOneOrManyByIds(array $ids): ?bool;
}
