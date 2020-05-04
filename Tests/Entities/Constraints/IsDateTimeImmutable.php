<?php

namespace Tests\Entities\Constraints;

use DateTimeImmutable;
use PHPUnit\Framework\Constraint\Constraint;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
 * Class DateTimeConstraint
 * @package Tests\Entities\HelpersConstraints
 */
final class IsDateTimeImmutable extends Constraint
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * This method can be overridden to implement the evaluation algorithm.
     *
     * @param mixed $other value or object to evaluate
     * @return bool
     */
    protected function matches($other): bool
    {
        return ($other instanceof DateTimeImmutable);
    }
    public function toString(): string
    {
        return 'is instance of '.DateTimeImmutable::class;
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * To provide additional failure information additionalFailureDescription
     * can be used.
     *
     * @param mixed $other evaluated value or object
     *
     * @return string
     * @throws InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        return \sprintf(
            '"%s" is '.DateTimeImmutable::class,
            $other
        );
    }
}