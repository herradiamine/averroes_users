<?php

namespace Database\Engine;

use Config\PDOConfigEntity;
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
}
