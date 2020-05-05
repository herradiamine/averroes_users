<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;

/**
 * Trait AvailableDataTypes
 */
trait AvailableDataTypesTrait
{
    /** @var array $entityData */
    public $entityData;

    public function __construct()
    {
        $this->entityData = [
            ['integer', 340198],
            ['float', 3.40198],
            ['string', 'String'],
            ['boolean', true],
            ['array', []],
            ['datetime', DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            ['null', null]
        ];
    }
}
