<?php

declare(strict_types=1);

namespace Models;

use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\User;

/**
 * Class UserModel
 * @package Models
 * @codeCoverageIgnore
 */
class UserModel extends ModelManager implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = User::class;
        $this->table = User::TABLE_NAME;
        $this->entityLabelId = User::LABEL_USER_ID;
    }
}
