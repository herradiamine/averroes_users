<?php

declare(strict_types=1);

namespace Entities\Exceptions;

use Exception;
use Throwable;

/**
 * Class EntityException
 * @package Entities\Exceptions
 * @codeCoverageIgnore
 */
class EntityException extends Exception
{
    private const DEFAULT_MESSAGE = "It seems that your entity contains errors";

    /**
     * Construct the exception. Note: The message is NOT binary safe.
     * @link https://php.net/manual/en/exception.construct.php
     * @param string    $location [required] The method where the exception wæs thrown
     * @param string    $message  [optional] The Exception message to throw.
     * @param int       $code     [optional] The Exception code.
     * @param Throwable $previous [optional] The previous throwable used for the exception chaining.
     */
    public function __construct($location, $message = self::DEFAULT_MESSAGE, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "$location : $message";
    }
}
