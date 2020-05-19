<?php

declare(strict_types=1);

namespace Tests\Entities;

use DateTimeImmutable;
use Entities\UserProperty;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Entities\Traits\PropertyProviderTrait;
use TypeError;

/**
 * Class UserPropertyTest
 * @package Tests\Entities
 */
class UserPropertyTest extends TestCase
{
    use PropertyProviderTrait {
        PropertyProviderTrait::__construct as availableData;
    }

    public const LABEL_INDEX_REAL        = 'real';
    public const LABEL_INDEX_INVALID_ARG = 'invalid_arg';
    public const LABEL_INDEX_TYPE_ERROR  = 'type_error';
    public const LABEL_INDEX_EMPTY       = 'empty';
    public const LABEL_INDEX_NULL        = 'null';

    /** @var UserProperty $userPropertyEntity */
    private UserProperty $userPropertyEntity;

    /** @var UserProperty|MockObject $mockEntity */
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
        $this->mockEntity = static::createMock(UserProperty::class);
        $this->userPropertyEntity = new UserProperty();
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

                static::assertTrue($this->userPropertyEntity->setUserPropertyId($value));
                static::assertEquals($value, $this->userPropertyEntity->getUserPropertyId());

                static::assertTrue($this->mockEntity->setUserPropertyId($value));
                static::assertEquals($value, $this->mockEntity->getUserPropertyId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_property_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyEntity->setUserPropertyId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserPropertyId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_property_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyEntity->setUserPropertyId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserPropertyId($value);
                break;
        }
    }

    /**
     * @dataProvider provideUserGroupId
     * @param $type
     * @param $value
     */
    public function testSetUserGroupId($type, $value)
    {
        $set_user_group_id = $this->mockEntity->method('setUserGroupId');
        $get_user_group_id = $this->mockEntity->method('getUserGroupId');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
            case self::LABEL_INDEX_NULL:
                $set_user_group_id->with($value)->willReturn(true);
                $get_user_group_id->willReturn($value);

                static::assertTrue($this->userPropertyEntity->setUserGroupId($value));
                static::assertEquals($value, $this->userPropertyEntity->getUserGroupId());

                static::assertTrue($this->mockEntity->setUserGroupId($value));
                static::assertEquals($value, $this->mockEntity->getUserGroupId());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_user_group_id->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyEntity->setUserGroupId($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUserGroupId($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_user_group_id->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyEntity->setUserGroupId($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUserGroupId($value);
                break;
        }
    }

    /**
     * @dataProvider providePropertyName
     * @param $type
     * @param $value
     */
    public function testSetPropertyName($type, $value)
    {
        $set_property_name = $this->mockEntity->method('setPropertyName');
        $get_property_name = $this->mockEntity->method('getPropertyName');

        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_property_name->with($value)->willReturn(true);
                $get_property_name->willReturn($value);

                static::assertTrue($this->userPropertyEntity->setPropertyName($value));
                static::assertEquals($value, $this->userPropertyEntity->getPropertyName());

                static::assertTrue($this->mockEntity->setPropertyName($value));
                static::assertEquals($value, $this->mockEntity->getPropertyName());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_property_name->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyEntity->setPropertyName($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setPropertyName($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_property_name->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyEntity->setPropertyName($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setPropertyName($value);
                break;
        }
    }

    /**
     * @dataProvider providePropertyType
     * @param $type
     * @param $value
     */
    public function testSetPropertyType($type, $value)
    {
        $set_property_type = $this->mockEntity->method('setPropertyType');
        $get_property_type = $this->mockEntity->method('getPropertyType');

        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_property_type->with($value)->willReturn(true);
                $get_property_type->willReturn($value);

                static::assertTrue($this->userPropertyEntity->setPropertyType($value));
                static::assertEquals($value, $this->userPropertyEntity->getPropertyType());

                static::assertTrue($this->mockEntity->setPropertyType($value));
                static::assertEquals($value, $this->mockEntity->getPropertyType());
                break;
            case self::LABEL_INDEX_INVALID_ARG:
                $set_property_type->with($value)->willThrowException(new InvalidArgumentException());

                $this->expectException(InvalidArgumentException::class);
                $this->userPropertyEntity->setPropertyType($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setPropertyType($value);
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_property_type->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyEntity->setPropertyType($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setPropertyType($value);
                break;
        }
    }

    /**
     * @dataProvider providePropertyEnabled
     * @param $type
     * @param $value
     */
    public function testSetPropertyEnabled($type, $value)
    {
        $set_property_enabled = $this->mockEntity->method('setPropertyEnabled');
        $is_property_enabled  = $this->mockEntity->method('isPropertyEnabled');
        switch ($type) {
            case self::LABEL_INDEX_REAL:
                $set_property_enabled->with($value);
                $is_property_enabled->willReturn($value);

                $this->userPropertyEntity->setPropertyEnabled($value);
                static::assertTrue($this->userPropertyEntity->isPropertyEnabled());

                $this->mockEntity->setPropertyEnabled($value);
                static::assertTrue($this->mockEntity->isPropertyEnabled());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_property_enabled->with($value)->willThrowException(new TypeError());
                $is_property_enabled->willReturn(false);

                $this->expectException(TypeError::class);
                $this->userPropertyEntity->setPropertyEnabled($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setPropertyEnabled($value);
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

                $this->userPropertyEntity->setCreationDate($value);
                $this->mockEntity->setCreationDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userPropertyEntity->getCreationDate()
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
                $this->userPropertyEntity->setCreationDate($value);

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

                $this->userPropertyEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->userPropertyEntity->getUpdateDate()
                );
                static::assertInstanceOf(
                    DateTimeImmutable::class,
                    $this->mockEntity->getUpdateDate()
                );
                break;
            case self::LABEL_INDEX_NULL:
                $set_update_date->with($value);
                $get_update_date->willReturn($value);

                $this->userPropertyEntity->setUpdateDate($value);
                $this->mockEntity->setUpdateDate($value);

                static::assertNull($this->userPropertyEntity->getUpdateDate());
                static::assertNull($this->mockEntity->getUpdateDate());
                break;
            case self::LABEL_INDEX_TYPE_ERROR:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_update_date->with($value)->willThrowException(new TypeError());

                $this->expectException(TypeError::class);
                $this->userPropertyEntity->setUpdateDate($value);

                $this->expectException(TypeError::class);
                $this->mockEntity->setUpdateDate($value);
                break;
        }
    }
}
