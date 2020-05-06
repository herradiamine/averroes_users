<?php


namespace Tests\Config\Constraints;


use SebastianBergmann\RecursionContext\InvalidArgumentException;

class IsEmptyString extends \PHPUnit\Framework\Constraint\Constraint
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
        parent::matches($other);
        return empty($other);
    }

    public function toString(): string
    {
        return 'is empty string';
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
        parent::failureDescription($other);
        return \sprintf(
            '"%s" is empty string',
            $other
        );
    }
}