<?php

declare(strict_types=1);

namespace Tests\Entities\Traits;

use DateTimeImmutable;
use Tests\Entities\UserPropertyValueTest;

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
            [UserPropertyValueTest::LABEL_INDEX_REAL, 39873],
            [UserPropertyValueTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserPropertyValueTest::LABEL_INDEX_TYPE_ERROR, '39870'],
            [UserPropertyValueTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->userId = [
            [UserPropertyValueTest::LABEL_INDEX_REAL, 39873],
            [UserPropertyValueTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserPropertyValueTest::LABEL_INDEX_TYPE_ERROR, '39871'],
            [UserPropertyValueTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->userPropertyId = [
            [UserPropertyValueTest::LABEL_INDEX_REAL, 39873],
            [UserPropertyValueTest::LABEL_INDEX_INVALID_ARG, 0],
            [UserPropertyValueTest::LABEL_INDEX_TYPE_ERROR, '39873'],
            [UserPropertyValueTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->customValue = [
            [UserPropertyValueTest::LABEL_INDEX_REAL, 'CUSTOM_VALUE'],
            [UserPropertyValueTest::LABEL_INDEX_INVALID_ARG, ['']]
        ];
        $this->creationDate = [
            [UserPropertyValueTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('yesterday')
                )
            )],
            [UserPropertyValueTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('yesterday'))],
            [UserPropertyValueTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->updateDate = [
            [UserPropertyValueTest::LABEL_INDEX_REAL, DateTimeImmutable::createFromFormat(
                DATE_W3C,
                date(
                    DATE_W3C,
                    strtotime('today')
                )
            )],
            [UserPropertyValueTest::LABEL_INDEX_NULL, null],
            [UserPropertyValueTest::LABEL_INDEX_TYPE_ERROR, date(DATE_W3C, strtotime('now'))],
            [UserPropertyValueTest::LABEL_INDEX_EMPTY, '']
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
