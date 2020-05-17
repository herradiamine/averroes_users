<?php

declare(strict_types=1);

namespace Models\Engine;

use Config\PDOConfigEntity;
use Models\Exceptions\ModelException;
use Models\Helpers\ModelHelper;
use Models\Interfaces\ModelInterface;
use Generator;
use PDO;
use TypeError;

/**
 * Abstract ModelManager
 * @package Database/Engine
 * @codeCoverageIgnore
 */
abstract class ModelManager extends PDO implements ModelInterface
{
    private const INSERT_MANY_FIELDS_KEY = "fields";
    private const INSERT_MANY_VALUES_KEY = "values";

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
    ): Generator {
        $fields = ModelHelper::quoteElements($displayFiedls);
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
     * Gets all stored elements.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array $displayFields
     * @param int   $limit
     * @param int   $offset
     * @return Generator
     * @throws ModelException
     */
    public function getAll(
        array $displayFields = ['*'],
        int $limit = 20,
        int $offset = 0
    ): Generator {
        $fields = ModelHelper::quoteElements($displayFields);
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
     * @return int
     * @throws ModelException
     */
    public function insertOne(
        array $data
    ): int {
        $fields = "$this->table." . implode(", $this->table.", array_keys($data));
        $values = ModelHelper::quoteElements(array_values($data));
        $sql    = "INSERT INTO $this->table ($fields) VALUES ($values)";

        if ($this->query($sql)) {
            return (int) $this->lastInsertId("$this->table.$this->entityLabelId");
        } else {
            throw new ModelException(__METHOD__);
        }
    }

    /**
     * Inserts many elements at once, must have one or many datas to be inserted
     * and respect every fields data types rules.
     * Returns the inserted elements ids in an array.
     * @param array $datas
     * @return bool
     * @throws ModelException|TypeError
     */
    public function insertMany(
        array $datas
    ): bool {
        if (array_key_exists(ModelManager::INSERT_MANY_FIELDS_KEY, $datas)) {
            $fields  = "$this->table.";
            $fields .= implode(", $this->table.", $datas[ModelManager::INSERT_MANY_FIELDS_KEY]);
        } else {
            throw new ModelException(__METHOD__, ModelException::INSERT_MANY_FIELDS_KEY);
        }

        $values = [];
        if (array_key_exists(ModelManager::INSERT_MANY_VALUES_KEY, $datas)) {
            $count_fields = count($datas[self::INSERT_MANY_FIELDS_KEY]);

            foreach ($datas[ModelManager::INSERT_MANY_VALUES_KEY] as $value) {
                $count_value = count($value);

                if ($count_fields == $count_value) {
                    $values[] = "(" . ModelHelper::quoteElements(array_values($value)) . ")";
                } else {
                    $message = sprintf(
                        ModelException::INSERT_MANY_VALUES_COUNT,
                        $count_value,
                        $count_fields
                    );
                    throw new ModelException(__METHOD__, $message);
                }
            }
            $values = implode(', ', $values);
        } else {
            throw new ModelException(__METHOD__, ModelException::INSERT_MANY_VALUES_KEY);
        }

        $sql = "INSERT INTO $this->table ($fields) VALUES $values";
        if ($this->query($sql)) {
            return true;
        } else {
            throw new ModelException(__METHOD__);
        }
    }

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
    ): bool {
        $first = true;
        $ids = implode(",", $ids);

        $sql = "UPDATE $this->table SET";
        foreach ($data as $key => $value) {
            $sql .= ($first) ? " " : "";
            $sql .= "$this->table.$key = :$key";
            $sql .= (next($data)) ? ", " : " ";
            $first = false;
        }
        $sql .= "WHERE $this->table.$this->entityLabelId IN ($ids)";

        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        if ($statement->execute()) {
            return true;
        } else {
            throw new ModelException(__METHOD__);
        }
    }

    /**
     * Deletes many elements by ids, must have array of ids elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array $ids
     * @return bool
     * @throws ModelException
     */
    public function deleteOneOrManyByIds(
        array $ids
    ): ?bool {
        $ids = implode(',', $ids);
        $sql = "DELETE FROM $this->table WHERE $this->table.$this->entityLabelId IN ($ids)";
        $query = $this->query($sql);

        if ($query) {
            $result = $query->execute();
        } else {
            throw new ModelException(__METHOD__);
        }
        return $result;
    }
}
