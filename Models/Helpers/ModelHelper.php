<?php

declare(strict_types=1);

namespace Models\Helpers;

use PDO;
use ReflectionClass;

/**
 * Class ModelHelper
 * @package Models\Helpers
 */
class ModelHelper
{
    /**
     * @param array $displayFields
     * @return false|string
     * @codeCoverageIgnore
     */
    public static function quoteElements(array $displayFields = []): string
    {
        $fields = "";
        $pdo_reflection = new ReflectionClass(PDO::class);

        /** @var PDO $pdo */
        $pdo = $pdo_reflection->newInstanceWithoutConstructor();

        if (count($displayFields) > 1) {
            $count = count($displayFields);
            for ($key = 0; $key < $count; $key++) {
                $fields .= $pdo->quote($displayFields[$key]);
                $fields .= ($key != ($count - 1)) ? "," : "";
            }
        } elseif (in_array('*', $displayFields)) {
            $fields = $displayFields[0];
        } else {
            $fields = $pdo->quote($displayFields[0]);
        }
        return $fields;
    }
}
