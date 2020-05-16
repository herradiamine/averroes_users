<?php

declare(strict_types=1);

namespace Models;

use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\UserProperty;

/**
 * Class UserPropertyModel
 * @package Models
 * @codeCoverageIgnore
 */
class UserPropertyModel extends ModelManager implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = UserProperty::class;
        $this->table = UserProperty::TABLE_NAME;
        $this->entityLabelId = UserProperty::LABEL_USER_PROPERTY_ID;
    }
}
