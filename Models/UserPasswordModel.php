<?php

declare(strict_types=1);

namespace Models;

use Generator;
use Models\Exceptions\ModelException;
use Models\Helpers\ModelHelper;
use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\UserPassword;
use PDO;

/**
 * Class UserPasswordModel
 * @package Models
 */
class UserPasswordModel extends ModelManager implements ModelInterface
{
    /** @var string $table */
    private string $table = UserPassword::TABLE_NAME;

    /**
     * Gets one element using select by id and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter.
     * @param int   $id
     * @param array $displayFiedls
     * @return UserPassword|null
     * @throws ModelException
     */
    public function getOneById(
        int $id,
        array $displayFiedls = ['*']
    ): ?UserPassword {
        $fields = ModelHelper::quoteFields($displayFiedls);

        $sql    = "
            SELECT $fields 
            FROM $this->table 
            WHERE $this->table.user_password_id = $id
        ";
        $query  = $this->query($sql);
        $result = null;

        if ($query) {
            $query->setFetchMode(
                PDO::FETCH_CLASS,
                UserPassword::class
            );
            $result = $query->fetch();
        } else {
            throw new ModelException(__METHOD__);
        }
        return $result;
    }

    /**
     * Gets many elements using select by many ids and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array $ids
     * @param array $displayFiedls
     * @param int   $limit
     * @param int   $offset
     * @return Generator
     * @throws ModelException
     */
    public function getManyByIds(
        array $ids,
        array $displayFiedls = ['*'],
        int $limit = 20,
        int $offset = 0
    ): Generator {
        $fields = ModelHelper::quoteFields($displayFiedls);
        $ids = implode(",", $ids);

        $sql = "
            SELECT $fields 
            FROM $this->table 
            WHERE $this->table.user_password_id IN ($ids) 
            LIMIT $offset, $limit
        ";
        $query = $this->query($sql);

        if ($query) {
            $query->setFetchMode(
                PDO::FETCH_CLASS,
                UserPassword::class
            );
            while ($result = $query->fetchAll()) {
                yield $result;
            }
        } else {
            throw new ModelException(__METHOD__);
        }
    }

    /**
     * Gets one or many elements using custom data select and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array $displayFields
     * @param array $operatorKeyValue
     * @param int   $limit
     * @param int   $offset
     * @return array|false
     */
    public function getCustom(
        array $displayFields = [],
        array $operatorKeyValue = [],
        int $limit = 20,
        int $offset = 0
    ): ?array {
        return [];
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
    public function getAll(
        array $displayFields = [],
        int $limit = 20,
        int $offset = 0
    ): ?array {
        return [];
    }

    /**
     * Inserts one element, must have data to be inserted and respect every fields data types rules.
     * Returns the inserted element id.
     * @param array $data
     * @param array $rules
     * @return int|false
     */
    public function insertOne(
        array $data,
        array $rules
    ): ?int {
        return 1;
    }

    /**
     * Inserts many elements at once, must have one or many datas to be inserted
     * and respect every fields data types rules.
     * Returns the inserted elements ids in an array.
     * @param array $datas
     * @param array $rules
     * @return array|false
     */
    public function insertMany(
        array $datas,
        array $rules
    ): ?array {
        return [];
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
    public function updateOneById(
        int $id,
        array $data,
        array $rules
    ): ?int {
        return 1;
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
    public function updateManyByIds(
        array $ids,
        array $datas,
        array $rules
    ): ?array {
        return [];
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
    public function updateManyByCustom(
        array $dataSelects,
        array $dataUpdates,
        array $rules
    ): ?array {
        return [];
    }

    /**
     * Deletes on element by id, must have element id to be deleted.
     * Returns boolean.
     * @param int $id
     * @return bool
     */
    public function deleteOneById(int $id): bool
    {
        return true;
    }

    /**
     * Deletes many elements by ids, must have array of ids elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array $ids
     * @return array|false
     */
    public function deleteManyByIds(array $ids): ?array
    {
        return [];
    }

    /**
     * Deletes many elements by custom selets datas, must have array of datas to select elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array $dataSelects
     * @return array|false
     */
    public function deleteManyByCustom(array $dataSelects): ?array
    {
        return [];
    }
}
