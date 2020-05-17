<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;
use Tests\Entities\UserPropertyTest;

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
            [UserPropertyTest::LABEL_INDEX_REAL, 39873],
            [UserPropertyTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserPropertyTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserPropertyTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->userGroupId = [
            [UserPropertyTest::LABEL_INDEX_REAL, 39873],
            [UserPropertyTest::LABEL_INDEX_NULL, null],
            [UserPropertyTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserPropertyTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserPropertyTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->propertyName = [
            [UserPropertyTest::LABEL_INDEX_REAL, 'PROPERTY_NAME'],
            [UserPropertyTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserPropertyTest::LABEL_INDEX_TYPE_ERROR, 39873],
            [UserPropertyTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->propertyType = [
            [UserPropertyTest::LABEL_INDEX_REAL, 'PROPERTY_TYPE'],
            [UserPropertyTest::LABEL_INDEX_INVALID_ARG, ''],
            [UserPropertyTest::LABEL_INDEX_TYPE_ERROR, 39873],
            [UserPropertyTest::LABEL_INDEX_EMPTY, null]
        ];
        $this->propertyEnabled = [
            [UserPropertyTest::LABEL_INDEX_REAL, true],
            [UserPropertyTest::LABEL_INDEX_TYPE_ERROR, 1],
            [UserPropertyTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->creationDate = [
            [UserPropertyTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            [UserPropertyTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('tomorrow'))],
            [UserPropertyTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->updateDate = [
            [UserPropertyTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            [UserPropertyTest::LABEL_INDEX_NULL, null],
            [UserPropertyTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('now'))],
            [UserPropertyTest::LABEL_INDEX_EMPTY, '']
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
