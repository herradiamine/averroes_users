<?php

namespace Database\Engine;

use Config\PDOConfigEntity;
use Database\Delete;
use Database\Insert;
use Database\Select;
use Database\Update;
use PDO;

/**
 * Class ModelManager
 * @package Database/Engine
 */
class ModelManager extends PDO
{
    /** @var PDOConfigEntity $pdoConfig */
    private PDOConfigEntity $pdoConfig;

    /**
     * ModelManager constructor.
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

    public function select(): Select
    {
        return new Select();
    }

    public function insert(): Insert
    {
        return new Insert();
    }

    public function update(): Update
    {
        return new Update();
    }

    public function delete(): Delete
    {
        return new Delete();
    }
}
