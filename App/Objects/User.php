<?php

declare(strict_types=1);

namespace App\Objects;

use Entities\UserEmail;
use Entities\UserGroup;
use Entities\UserPassword;
use Entities\UserProperty;
use Entities\UserPropertyValue;

/**
 * Class User
 * @package App\Objects
 */
class User
{
    public const INT_VALUE    = 'INTEGER';
    public const FLOAT_VALUE  = 'FLOAT';
    public const BOOL_VALUE   = 'BOOLEAN';
    public const STRING_VALUE = 'STRING';
    public const NULL_VALUE   = 'NULL';
    public const OBJECT_VALUE = [
        'user' => \Entities\User::class,
        'user_email' => UserEmail::class,
        'user_group' => UserGroup::class,
        'user_password' => UserPassword::class,
        'user_property' => UserProperty::class,
        'user_property_value' => UserPropertyValue::class
    ];
}
