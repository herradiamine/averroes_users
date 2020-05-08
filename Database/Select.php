<?php

declare(strict_types=1);

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
        $this->query .= "DISTINCT ($distinctField), ";
        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields = []): Select
    {
        if (empty($fields)) {
            $this->query .= "* \n";
        } else {
            $this->query .= implode(", ", $fields) . " \n";
        }
        return $this;
    }

    /**
     * @param string $field
     * @param array  $cases
     * @param string $asField
     * @return $this
     */
    public function case(
        string $field,
        array $cases,
        string $asField
    ): Select {
        $this->query .= "CASE $field \n";
        foreach ($cases as $value => $condition) {
            $this->query .= "\t WHEN " . implode(" ", $condition) . " THEN $value \n";
        }
        $this->query .= "END $asField \n";
        return $this;
    }

    /**
     * @param string $tableName
     * @return $this
     */
    public function from(string $tableName): Select
    {
        $this->query .= "FROM $tableName \n";
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
    public function where(array $operatorKeyValue = []): Select
    {
        $this->query .= "WHERE ";
        $first = true;
        if (!empty($operatorKeyValue)) {
            foreach ($operatorKeyValue as $operator) {
                $logic   = ($first) ? "" : $operator[0];
                $compare = implode(" ", $operator[1]);

                $this->query .= $logic . " " . $compare . " ";
                $first = false;
            }
        }

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
    public function limit($limit = 20): Select
    {
        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function offset($offset = 0): Select
    {
        return $this;
    }

    /** @return array */
    public function fetch(): array
    {
        $result = $this->query($this->query);
        return $result->fetchAll(self::FETCH_CLASS);
    }
}
