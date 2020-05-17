<?php

declare(strict_types=1);

namespace Models;

use Generator;
use Models\Exceptions\ModelException;
use Models\Interfaces\ModelInterface;
use Models\Engine\ModelManager;
use Entities\UserEmail;

/**
 * Class UserEmailModel
 * @package Models
 * @codeCoverageIgnore
 */
class UserEmailModel extends ModelManager implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = UserEmail::class;
        $this->table = UserEmail::TABLE_NAME;
        $this->entityLabelId = UserEmail::LABEL_USER_EMAIL_ID;
    }
}
