<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;

/**
 * Trait PropertyProviderTrait
 *
 * @package Tests\Entities\Traits
 */
trait PropertyProviderTrait
{
    private array $userPropertyId;
    private array $userGroupId;
    private array $propertyName;
    private array $propertyType;
    private array $propertyEnabled;
    private array $creationDate;
    private array $updateDate;

    public function __construct()
    {
        $this->userPropertyId = [
            ['real', 39873],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->userGroupId = [
            ['real', 39873],
            ['null', null],
            ['invalid_arg', 0],
            ['type_error', '39873'],
            ['empty', '']
        ];
        $this->propertyName = [
            ['real', 'PROPERTY_NAME'],
            ['invalid_arg', ''],
            ['type_error', 39873],
            ['empty', null]
        ];
        $this->propertyType = [
            ['real', 'PROPERTY_TYPE'],
            ['invalid_arg', ''],
            ['type_error', 39873],
            ['empty', null]
        ];
        $this->propertyEnabled = [
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
            ['type_error', date(DATE_W3C, strtotime('tomorrow'))],
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
    public function provideUserPropertyId()
    {
        return $this->userPropertyId;
    }

    /** @return array */
    public function provideUserGroupId()
    {
        return $this->userGroupId;
    }

    /** @return array */
    public function providePropertyName()
    {
        return $this->propertyName;
    }

    /** @return array */
    public function providePropertyType()
    {
        return $this->propertyType;
    }

    /** @return array */
    public function providePropertyEnabled()
    {
        return $this->propertyEnabled;
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
