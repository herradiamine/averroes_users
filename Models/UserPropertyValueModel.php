<?php

declare(strict_types=1);

namespace Models;

use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\UserPropertyValue;

/**
 * Class UserPropertyValueModel
 * @package Models
 */
class UserPropertyValueModel extends ModelManager implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = UserPropertyValue::class;
        $this->table = UserPropertyValue::TABLE_NAME;
        $this->entityLabelId = UserPropertyValue::LABEL_USER_PROPERTY_ID;
    }
}
