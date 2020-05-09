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
            ['invalid_arg', ''],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->groupName = [
            ['real', 'GROUP NAME'],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
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
            ['type_error', date(DATE_W3C, strtotime('today'))],
            ['null', null],
            ['empty', '']
        ];
    }
    /** @return array */
    private function provideUserGroupId()
    {
        return $this->userGroupId;
    }

    /** @return array */
    private function provideGroupName()
    {
        return $this->groupName;
    }

    /** @return array */
    private function provideGroupEnabled()
    {
        return $this->groupEnabled;
    }

    /** @return array */
    private function provideCreationDate()
    {
        return $this->creationDate;
    }

    /** @return array */
    private function provideUpdateDate()
    {
        return $this->updateDate;
    }
}
