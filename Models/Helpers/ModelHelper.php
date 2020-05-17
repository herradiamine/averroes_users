<?php

declare(strict_types=1);

namespace Models\Helpers;

use Models\Engine\ModelManager;

/**
 * Class ModelHelper
 * @package Models\Helpers
 */
class ModelHelper extends ModelManager
{
    /**
     * @param array $displayFields
     * @return false|string
     */
    public static function quoteElements(array $displayFields = []): string
    {
        $fields = "";
        if (count($displayFields) > 1) {
            $count = count($displayFields);
            for ($key = 0; $key < $count; $key++) {
                $fields .= (new ModelHelper())->quote($displayFields[$key]);
                $fields .= ($key != ($count - 1)) ? "," : "";
            }
        } elseif (in_array('*', $displayFields)) {
            $fields = $displayFields[0];
        } else {
            $fields = (new ModelHelper())->quote($displayFields[0]);
        }
        return $fields;
    }
}
