<?php

declare(strict_types=1);

namespace Models;

use Config\PDOConfigEntity;
use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\User;

/**
 * Class UserModel
 * @package Models
 */
class UserModel extends ModelManager implements ModelInterface
{
    /**
     * ModelManager constructor using illuminate/database dependency.
     *
     * @param PDOConfigEntity $configuration
     * @return void
     */
    public function __construct(PDOConfigEntity $configuration)
    {
        parent::__construct($configuration);
        $this->entityName = User::class;
        $this->table = User::TABLE_NAME;
        $this->entityLabelId = User::LABEL_USER_ID;
    }
}
