<?php

namespace Entities\Helpers;

/**
 * Class EntityHelper
 * @package Entities\Helpers
 */
class EntityHelper
{
    /**
     * @param string $string
     * @param bool   $capitalizeFirstCharacter
     * @return string|string[]
     */
    public static function snakeToCamelCase(string $string, bool $capitalizeFirstCharacter = false)
    {
        $str = str_replace('_', '', ucwords($string, '_'));
        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }
        return $str;
    }
}
