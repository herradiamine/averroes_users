<?php

namespace Tests\Entities;

use Entities\UserEmail;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Traits\AvailableDataTypesTrait;

/**
 * Class UserEmailTest
 * @package App\Tests\Entities
 */
class UserEmailTest extends TestCase
{
    use AvailableDataTypesTrait {
        AvailableDataTypesTrait::__construct as availableData;
    }

    /** @var UserEmail $userGroupEntity */
    private UserEmail $userEmailEntity;

    /**
     * @param string|null $name
     * @param array       $data
     * @param int|string  $dataName
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->availableData();
        $this->userEmailEntity = new UserEmail();
    }
}
