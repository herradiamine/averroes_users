<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;

/**
 * Trait PropertyValueProviderTrait
 *
 * @package Tests\Entities\Traits
 */
trait PropertyValueProviderTrait
{
    private array $userPropertyValueId;
    private array $userId;
    private array $userPropertyId;
    private array $customValue;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userPropertyValueId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->userId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->userPropertyId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->customValue = [
            ['real', 'CUSTOM_VALUE'],
            ['invalid_arg', ['']]
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
            ['type_error', date(DATE_W3C, strtotime('now'))],
            ['empty', '']
        ];
    }

    /** @return array */
    public function provideUserPropertyValueId()
    {
        return $this->userPropertyValueId;
    }

    /** @return array */
    public function provideUserId()
    {
        return $this->userId;
    }

    /** @return array */
    public function provideUserPropertyId()
    {
        return $this->userPropertyId;
    }

    /** @return array */
    public function provideCustomValue()
    {
        return $this->customValue;
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
