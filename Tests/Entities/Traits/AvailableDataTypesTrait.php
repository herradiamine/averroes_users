<?php

namespace Tests\Entities\Traits;

use DateTime;
use DateTimeImmutable;
use Entities\User;
use Entities\UserEmail;
use Entities\UserGroup;
use Entities\UserPassword;
use Entities\UserProperty;
use Entities\UserPropertyValue;

/**
 * Trait AvailableDataTypes
 */
trait AvailableDataTypesTrait
{
    /** @var array $entityData */
    public array $entityData = [];

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
