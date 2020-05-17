<?php

declare(strict_types=1);

namespace Models;

use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\UserGroup;

/**
 * Class UserGroupModel
 * @package Models
 */
class UserGroupModel extends ModelManager implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = UserGroup::class;
        $this->table = UserGroup::TABLE_NAME;
        $this->entityLabelId = UserGroup::LABEL_USER_GROUP_ID;
    }
}
