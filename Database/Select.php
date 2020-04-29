<?php

namespace Database;

use Database\Engine\ModelManager;

/**
 * Class Select
 * @package Database
 */
class Select extends ModelManager
{
    /** @var string $query */
    private string $query = 'SELECT ';

    /**
     * @param string $distinctField
     * @return $this
     */
    public function distinct(string $distinctField): Select
    {
        return $this;
    }

    /**
     * @param array $concatFields
     * @param array $fields
     * @return $this
     */
    public function fiels(
        array $concatFields = [],
        array $fields = []
    ): Select {
        return $this;
    }

    /**
     * @param string $fiels
     * @param array  $cases
     * @param string $asField
     * @return $this
     */
    public function case(
        string $fiels,
        array $cases,
        string $asField
    ): Select {
        return $this;
    }

    /**
     * @param string $tableName
     * @return $this
     */
    public function from(string $tableName): Select
    {
        return $this;
    }

    /**
     * @param string $type
     * @param string $tableName
     * @param string $aKey
     * @param string $bKey
     * @return $this
     */
    public function join(
        string $type,
        string $tableName,
        string $aKey,
        string $bKey
    ): Select {
        return $this;
    }

    /**
     * @param array $operatorKeyValue
     * @return $this
     */
    public function where(array $operatorKeyValue): Select
    {
        return $this;
    }

    /**
     * @param string $field
     * @return $this
     */
    public function groupBy(string $field): Select
    {
        return $this;
    }

    /**
     * @return $this
     */
    public function having(): Select
    {
        return $this;
    }

    /**
     * @param $limit
     * @return $this
     */
    public function limit($limit): Select
    {
        return $this;
    }

    public function offset(): Select
    {
        return $this;
    }
}
