<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;

/**
 * Trait GroupProviderTrait
 *
 * @package Tests\Entities\Traits
 */
trait GroupProviderTrait
{
    private array $userGroupId;
    private array $groupName;
    private array $groupEnabled;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userGroupId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->groupName = [
            ['real', 'GROUP_NAME'],
            ['invalid_arg', ''],
            ['type_error', 39873],
            ['empty', null]
        ];
        $this->groupEnabled = [
            ['real', true],
            ['type_error', 1],
            ['empty', '']
        ];
        $this->creationDate = [
            ['real', DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            ['type_error', date(DATE_W3C, strtotime('yesterday'))],
            ['empty', '']
        ];
        $this->updateDate = [
            ['real', DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            ['null', null],
            ['type_error', date(DATE_W3C, strtotime('today'))],
            ['empty', '']
        ];
    }
    /** @return array */
    public function provideUserGroupId()
    {
        return $this->userGroupId;
    }

    /** @return array */
    public function provideGroupName()
    {
        return $this->groupName;
    }

    /** @return array */
    public function provideGroupEnabled()
    {
        return $this->groupEnabled;
    }

    /** @return array */
    public function provideCreationDate()
    {
        return $this->creationDate;
    }

    /** @return array */
    public function provideUpdateDate()
    {
        return $this->updateDate;
    }
}
