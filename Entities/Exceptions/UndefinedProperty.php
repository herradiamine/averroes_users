<?php

declare(strict_types=1);

namespace Entities\Exceptions;

use Exception;
use ErrorException;

/**
 * Class UndefinedMethod
 * @package Entities\Exceptions
 */
class UndefinedProperty extends ErrorException
{
    public const DEFAULT_MESSAGE = "Undefined property %s";

    /**
     * Constructs the exception
     * @link https://php.net/manual/en/errorexception.construct.php
     * @param           $location [required] The method where the exception wæs thrown
     * @param string    $message  [optional] The Exception message to throw.
     * @param int       $code     [optional] The Exception code.
     * @param int       $severity [optional] The severity level of the exception.
     * @param string    $filename [optional] The filename where the exception is thrown.
     * @param int       $lineno   [optional] The line number where the exception is thrown.
     * @param Exception $previous [optional] The previous exception used for the exception chaining.
     */
    public function __construct(
        $location,
        $message = self::DEFAULT_MESSAGE,
        $code = 0,
        $severity = 1,
        $filename = __FILE__,
        $lineno = __LINE__,
        $previous = null
    ) {
        parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
        $this->message = "$location : $message";
    }
}