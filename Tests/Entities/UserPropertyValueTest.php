<?php

declare(strict_types=1);

namespace Tests\Entities;

use DateTimeImmutable;
use Entities\UserPropertyValue;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Traits\PropertyValueProviderTrait;
use TypeError;

/**
 * Class UserPropertyValueTest
 * @package Tests\Entities
 */
class UserPropertyValueTest extends TestCase
{
    use PropertyValueProviderTrait {
        PropertyValueProviderTrait::__construct as availableData;
    }

    public const LABEL_INDEX_REAL        = 'real';
    public const LABEL_INDEX_INVALID_ARG = 'invalid_arg';
    public const LABEL_INDEX_TYPE_ERROR  = 'type_error';
    public const LABEL_INDEX_EMPTY       = 'empty';
    public const LABEL_INDEX_NULL        = 'null';

    /** @var UserPropertyValue $userPropertyValueEntity */
    private UserPropertyValue $userPropertyValueEntity;

    /** @var UserPropertyValue|MockObject $mockEntity */
    private MockObject $mockEntity;

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
        $this->mockEntity = $this->createMock(UserPropertyValue::class);
        $this->userPropertyValueEntity = new UserPropertyValue();
    }

    /**
     * @dataProvider provideUserPropertyValueId
     * @param $type
     * @param $value
     */
    public function testSetUserPropertyValueId($type, $value)
    {
        $set_user_property_value_id = $this->mockEntity->method('setUserPropertyValueId');
        $get_user_property_value_id = $this->mockEntity->method('getUserPropertyValueId');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_property_value_id->with($value)->willReturn(true);
                $get_user_property_value_id->willReturn($value);

                static::assertTrue($this->userPropertyValueEntity->setUserPropertyValueId($value));
                static::assertEquals($value, $this->userPropertyValueEntity->getUserPropertyValueId());

                static::assertTrue($this->mockEntity->setUserPropertyValueId($value));
                static::assertEquals($value, $this->mockEntity->getUserPropertyValueId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_property_value_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyValueEntity->setUserPropertyValueId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserPropertyValueId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_property_value_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyValueEntity->setUserPropertyValueId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserPropertyValueId($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserId
     * @param $type
     * @param $value
     */
    public function testSetUserId($type, $value)
    {
        $set_user_id = $this->mockEntity->method('setUserId');
        $get_user_id = $this->mockEntity->method('getUserId');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_id->with($value)->willReturn(true);
                $get_user_id->willReturn($value);

                static::assertTrue($this->userPropertyValueEntity->setUserId($value));
                static::assertEquals($value, $this->userPropertyValueEntity->getUserId());

                static::assertTrue($this->mockEntity->setUserId($value));
                static::assertEquals($value, $this->mockEntity->getUserId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyValueEntity->setUserId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyValueEntity->setUserId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserId($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserPropertyId
     * @param $type
     * @param $value
     */
    public function testSetUserPropertyId($type, $value)
    {
        $set_user_property_id = $this->mockEntity->method('setUserPropertyId');
        $get_user_property_id = $this->mockEntity->method('getUserPropertyId');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_user_property_id->with($value)->willReturn(true);
                $get_user_property_id->willReturn($value);

                static::assertTrue($this->userPropertyValueEntity->setUserPropertyId($value));
                static::assertEquals($value, $this->userPropertyValueEntity->getUserPropertyId());

                static::assertTrue($this->mockEntity->setUserPropertyId($value));
                static::assertEquals($value, $this->mockEntity->getUserPropertyId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_property_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyValueEntity->setUserPropertyId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserPropertyId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_property_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyValueEntity->setUserPropertyId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserPropertyId($value);
                break;
        }
    }

    /**
     * @dataProvider provideCustomValue
     * @param $type
     * @param $value
     */
    public function testSetCustomValue($type, $value)
    {
        $set_custom_value = $this->mockEntity->method('setCustomValue');
        $get_custom_value = $this->mockEntity->method('getCustomValue');

        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_custom_value->with($value)->willReturn(true);
                $get_custom_value->willReturn($value);

                static::assertTrue($this->userPropertyValueEntity->setCustomValue($value));
                static::assertEquals($value, $this->userPropertyValueEntity->getCustomValue());

                static::assertTrue($this->mockEntity->setCustomValue($value));
                static::assertEquals($value, $this->mockEntity->getCustomValue());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
            default:
                $set_custom_value->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyValueEntity->setCustomValue($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setCustomValue($value);
                break;
        }
    }

    /**
     * @dataProvider provideCreationDate
     * @param $type
     * @param $value
     */
    public function testSetCreationDate($type, $value)
    {
        $set_creation_date = $this->mockEntity->method('setCreationDate');
        $get_creation_date = $this->mockEntity->method('getCreationDate');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_creation_date->with($value);
                $get_creation_date->willReturn($value);

                $this->userPropertyValueEntity->setCreationDate($value);
                $this->mockEntity->setCreationDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userPropertyValueEntity->getCreationDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getCreationDate()
                );
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_creation_date->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyValueEntity->setCreationDate($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setCreationDate($value);
                break;
        }
    }

    /**
     * @dataProvider provideUpdateDate
     * @param $type
     * @param $value
     */
    public function testSetUpdateDate($type, $value)
    {
        $set_update_date = $this->mockEntity->method('setUpdateDate');
        $get_update_date = $this->mockEntity->method('getUpdateDate');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userPropertyValueEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userPropertyValueEntity->getUpdateDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getUpdateDate()
                );
                break;
            case self::LABEL_INDEX_NULL:
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userPropertyValueEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertNull($this->userPropertyValueEntity->getUpdateDate());
                static::assertNull($this->mockEntity->getUpdateDate());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_update_date->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyValueEntity->setUpdateDate($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
