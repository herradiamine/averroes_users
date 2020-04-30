<?php

namespace Database\Engine;

use Config\PDOConfigEntity;
use PDO;

/**
 * Class ModelManager
 * @package Database
 */
class ModelManager
{
    /** @var PDOConfigEntity $pdoConfig */
    private PDOConfigEntity $pdoConfig;

    /** @var PDO $pdo */
    private PDO $pdo;

    public function __construct()
    {
        $this->pdoConfig = new PDOConfigEntity();
        $this->pdo = new PDO(
            $this->pdoConfig->getDns(),
            $this->pdoConfig->getUsername(),
            $this->pdoConfig->getPassword()
        );
    }
}
