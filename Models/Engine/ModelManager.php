<?php

declare(strict_types=1);

namespace Models\Engine;

use Config\PDOConfigEntity;
use PDO;

/**
 * Abstract ModelManager
 * @package Database/Engine
 */
abstract class ModelManager extends PDO
{
    /** @var PDOConfigEntity $pdoConfig */
    private PDOConfigEntity $pdoConfig;

    /** @var PDO $pdo */
    protected PDO $pdo;

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
}
