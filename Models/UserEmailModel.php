<?php

namespace Models;

use Models\Interfaces\ModelInterface;

/**
 * Class UserEmailModel
 * @package Models
 */
class UserEmailModel implements ModelInterface
{
    /**
     * Gets one element using select by id and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param int   $id
     * @param array $displayFiedls
     * @param int   $limit
     * @param int   $offset
     * @return object|false
     */
    public function getOneById(int $id, array $displayFiedls = [], int $limit = 20, int $offset = 0): ?object
    {
        // TODO: Implement getOneById() method.
    }

    /**
     * Gets many elements using select by many ids and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array $ids
     * @param array $displayFiedls
     * @param int   $limit
     * @param int   $offset
     * @return array|false
     */
    public function getManyByIds(array $ids, array $displayFiedls = [], int $limit = 20, int $offset = 0): ?array
    {
        // TODO: Implement getManyByIds() method.
    }

    /**
     * Gets one or many elements using custom data select and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array $dataSelect
     * @param array $displayFields
     * @param int   $limit
     * @param int   $offset
     * @return array|false
     */
    public function getCustom(array $dataSelect, array $displayFields = [], int $limit = 20, int $offset = 0): ?array
    {
        // TODO: Implement getCustom() method.
    }

    /**
     * Gets all stored elements.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array $displayFields
     * @param int   $limit
     * @param int   $offset
     * @return array|false
     */
    public function getAll(array $displayFields = [], int $limit = 20, int $offset = 0): ?array
    {
        // TODO: Implement getAll() method.
    }

    /**
     * Inserts one element, must have data to be inserted and respect every fields data types rules.
     * Returns the inserted element id.
     * @param array $data
     * @param array $rules
     * @return int|false
     */
    public function insertOne(array $data, array $rules): ?int
    {
        // TODO: Implement insertOne() method.
    }

    /**
     * Inserts many elements at once, must have one or many datas to be inserted
     * and respect every fields data types rules.
     * Returns the inserted elements ids in an array.
     * @param array $datas
     * @param array $rules
     * @return array|false
     */
    public function insertMany(array $datas, array $rules): ?array
    {
        // TODO: Implement insertMany() method.
    }

    /**
     * Updates one element by his id, must have id of element to be updated and data to replace.
     * Must respect all fields data types rules.
     * Returns id of updated element or false.
     * @param int   $id
     * @param array $data
     * @param array $rules
     * @return int|false
     */
    public function updateOneById(int $id, array $data, array $rules): ?int
    {
        // TODO: Implement updateOneById() method.
    }

    /**
     * Updates many elements by their ids, must have array of elements ids to be updated and datas to replace.
     * Must respect all fields data types rules.
     * Returns array that contains boolean in front of each elements ids that has been updated or not.
     * @param array $ids
     * @param array $datas
     * @param array $rules
     * @return array|false
     */
    public function updateManyByIds(array $ids, array $datas, array $rules): ?array
    {
        // TODO: Implement updateManyByIds() method.
    }

    /**
     * Updates many elements by custum selected data, must have array of selects datas to be updated.
     * Must respect all fields data types rules.
     * Returns array that contains boolean in front of each elements ids that has been updated or not.
     * @param array $dataSelects
     * @param array $dataUpdates
     * @param array $rules
     * @return array|false
     */
    public function updateManyByCustom(array $dataSelects, array $dataUpdates, array $rules): ?array
    {
        // TODO: Implement updateManyByCustom() method.
    }

    /**
     * Deletes on element by id, must have element id to be deleted.
     * Returns boolean.
     * @param int $id
     * @return bool
     */
    public function deleteOneById(int $id): bool
    {
        // TODO: Implement deleteOneById() method.
    }

    /**
     * Deletes many elements by ids, must have array of ids elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array $ids
     * @return array|false
     */
    public function deleteManyByIds(array $ids): ?array
    {
        // TODO: Implement deleteManyByIds() method.
    }

    /**
     * Deletes many elements by custom selets datas, must have array of datas to select elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array $dataSelects
     * @return array|false
     */
    public function deleteManyByCustom(array $dataSelects): ?array
    {
        // TODO: Implement deleteManyByCustom() method.
    }
}
