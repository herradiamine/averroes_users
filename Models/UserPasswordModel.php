<?php

declare(strict_types=1);

namespace Models;

use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\UserPassword;

/**
 * Class UserPasswordModel
 * @package Models
 * @codeCoverageIgnore
 */
class UserPasswordModel extends ModelManager implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = UserPassword::class;
        $this->table = UserPassword::TABLE_NAME;
        $this->entityLabelId = UserPassword::LABEL_USER_PASSWORD_ID;
    }
}
