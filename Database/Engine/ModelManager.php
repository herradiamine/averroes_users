<?php

namespace Database\Engine;

use PDO;

/**
 * Class ModelManager
 * @package Database
 */
class ModelManager
{
    /** @var PDOConfig $pdoConfig */
    private PDOConfig $pdoConfig;

    /** @var PDO $pdo */
    private PDO $pdo;

    public function __construct()
    {
        $this->pdoConfig = new PDOConfig();
        $this->pdo = new PDO(
            $this->pdoConfig->getDns(),
            $this->pdoConfig->getUsername(),
            $this->pdoConfig->getPassword()
        );
    }
}
