<?php

declare(strict_types=1);

namespace Models\Engine;

use Config\PDOConfigEntity;
use Generator;
use Models\Exceptions\ModelException;
use Models\Helpers\ModelHelper;
use Models\Interfaces\ModelInterface;
use PDO;

/**
 * Abstract ModelManager
 * @package Database/Engine
 */
abstract class ModelManager extends PDO implements ModelInterface
{
    /** @var PDOConfigEntity $pdoConfig */
    private PDOConfigEntity $pdoConfig;

    /** @var PDO $pdo */
    protected PDO $pdo;

    /** @var string $entityName */
    protected string $entityName;

    /** @var string $table */
    protected string $table;

    /** @var string $entityLabelId */
    protected string $entityLabelId;

    /**
     * ModelManager constructor using illuminate/database dependency.
     */
    public function __construct()
    {
        $this->pdoConfig = new PDOConfigEntity();
        parent::__construct(
            $this->pdoConfig->getDns(),
            $this->pdoConfig->getUsername(),
            $this->pdoConfig->getPassword()
        );
    }

    /**
     * Gets one element using select by id and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter.
     * @param int    $id
     * @param array  $displayFields
     * @return object|null
     * @throws ModelException
     */
    public function getOneById(
        int $id,
        array $displayFields = []
    ): ?object {
        $fields = ModelHelper::quoteFields($displayFields);
        $sql    = "
            SELECT $fields 
            FROM $this->table 
            WHERE $this->table.$this->entityLabelId = $id
        ";
        $query  = $this->query($sql);
        $result = null;

        if ($query) {
            $query->setFetchMode(
                ModelManager::FETCH_CLASS,
                $this->entityName
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
     * @param array  $ids
     * @param array  $displayFiedls
     * @param int    $limit
     * @param int    $offset
     * @return Generator|null
     * @throws ModelException
     */
    public function getManyByIds(
        array $ids,
        array $displayFiedls = [],
        int $limit = 20,
        int $offset = 0
    ): ?Generator {
        $fields = ModelHelper::quoteFields($displayFiedls);
        $ids = implode(",", $ids);
        $sql = "
            SELECT $fields 
            FROM $this->table 
            WHERE $this->table.$this->entityLabelId IN ($ids) 
            LIMIT $offset, $limit
        ";
        $query = $this->query($sql);

        if ($query) {
            $query->setFetchMode(
                ModelManager::FETCH_CLASS,
                $this->entityName
            );
            while ($result = $query->fetch()) {
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
     * @return array|null
     * @throws ModelException
     */
    public function getCustom(
        array $displayFields = [],
        array $operatorKeyValue = [],
        int $limit = 20,
        int $offset = 0
    ): ?Generator {
        return [];
    }

    /**
     * Gets all stored elements.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array $displayFields
     * @param int   $limit
     * @param int   $offset
     * @return Generator|null
     * @throws ModelException
     */
    public function getAll(
        array $displayFields = [],
        int $limit = 20,
        int $offset = 0
    ): ?Generator {
        $fields = ModelHelper::quoteFields($displayFields);
        $sql = "
            SELECT $fields 
            FROM $this->table 
            LIMIT $offset, $limit
        ";
        $query = $this->query($sql);

        if ($query) {
            $query->setFetchMode(
                ModelManager::FETCH_CLASS,
                $this->entityName
            );
            while ($result = $query->fetch()) {
                yield $result;
            }
        } else {
            throw new ModelException(__METHOD__);
        }
    }

    /**
     * Inserts one element, must have data to be inserted and respect every fields data types rules.
     * Returns the inserted element id.
     * @param array $data
     * @param array $rules
     * @return int|null
     * @throws ModelException
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
     * @return array|null
     * @throws ModelException
     */
    public function insertMany(
        array $datas,
        array $rules
    ): ?array {
        return[];
    }

    /**
     * Updates one element by his id, must have id of element to be updated and data to replace.
     * Must respect all fields data types rules.
     * Returns id of updated element or false.
     * @param int   $id
     * @param array $data
     * @param array $rules
     * @return int|null
     * @throws ModelException
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
     * @return array|null
     * @throws ModelException
     */
    public function updateManyByIds(
        array $ids,
        array $datas,
        array $rules,
        string $table = ''
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
     * @return array|null
     * @throws ModelException
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
     * @throws ModelException
     */
    public function deleteOneById(int $id): bool
    {
        return true;
    }

    /**
     * Deletes many elements by ids, must have array of ids elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array $ids
     * @return array|null
     * @throws ModelException
     */
    public function deleteManyByIds(array $ids): ?array
    {
        return [];
    }

    /**
     * Deletes many elements by custom selets datas, must have array of datas to select elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array $dataSelects
     * @return array|null
     * @throws ModelException
     */
    public function deleteManyByCustom(array $dataSelects): ?array
    {
        return [];
    }
}
