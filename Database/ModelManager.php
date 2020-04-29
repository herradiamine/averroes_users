<?php

namespace Database;

use PDO;

/**
 * Class ModelManager
 * @package Database
 */
abstract class ModelManager
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO();
    }
}
