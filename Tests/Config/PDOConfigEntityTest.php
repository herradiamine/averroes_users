<?php

declare(strict_types=1);

namespace Tests\Config;

use Config\PDOConfigEntity;
use Tests\Config\Traits\AvailableConfigDataTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Error;

/**
 * Class PDOConfigEntityTest
 * @package Tests\Config
 */
class PDOConfigEntityTest extends TestCase
{
    use AvailableConfigDataTrait {
        AvailableConfigDataTrait::__construct as availableConfigData;
    }

    public const LABEL_REAL_DRIVER   = 'mysql';
    public const LABEL_REAL_HOST     = '172.17.0.3';
    public const LABEL_REAL_DATABASE = 'averoes';
    public const LABEL_REAL_CHARSET  = 'utf8';
    public const LABEL_REAL_USERNAME = 'root';
    public const LABEL_REAL_PASSWORD = 'root';

    public const LABEL_INDEX_REAL           = 'real';
    public const LABEL_INDEX_EMPTY          = 'empty';
    public const LABEL_INDEX_DUMMY          = 'dummy';
    public const LABEL_INDEX_FAKE_DRIVER    = 'fake_driver';
    public const LABEL_INDEX_FAKE_HOST      = 'fake_host';
    public const LABEL_INDEX_EMPTY_DATABASE = 'empty_database';
    public const LABEL_INDEX_FAKE_CHARSET   = 'fake_charset';
    public const LABEL_INDEX_EMPTY_USERNAME = 'empty_username';
    public const LABEL_INDEX_EMPTY_PASSWORD = 'empty_password';

    /** @var PDOConfigEntity|MockObject $mockEntity */
    private ?MockObject $mockEntity;

    /** @var PDOConfigEntity $configEntity */
    private PDOConfigEntity $configEntity;

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
        $this->availableConfigData();
        $this->mockEntity   = $this->createMock(PDOConfigEntity::class);
        $this->configEntity = new PDOConfigEntity();
    }

    /**
     * @dataProvider setAvailableDatabaseConfig
     * @param $case
     * @param $config
     */
    public function testLoadDatabaseConfig($case, $config)
    {
        $set_database_config = $this->mockEntity->method('loadDatabaseConfig');
        $get_dns = $this->mockEntity->method('getDns');
        switch ($case) {
            case self::LABEL_INDEX_REAL:
                $set_database_config->with($config)->willReturn(true);
                static::assertTrue($this->mockEntity->loadDatabaseConfig($config));
                static::assertTrue($this->configEntity->loadDatabaseConfig($config));

                $get_dns->willReturn($this->configEntity->getDns());
                static::assertIsString($this->mockEntity->getDns());
                static::assertIsString($this->configEntity->getDns());
                break;
            case self::LABEL_INDEX_EMPTY:
                $set_database_config->with($config)->willThrowException(new Error());
                $this->expectException(Error::class);
                $this->configEntity->loadDatabaseConfig($config);

                $this->expectException(Error::class);
                $this->mockEntity->loadDatabaseConfig($config);
                break;
            case self::LABEL_INDEX_FAKE_DRIVER:
            case self::LABEL_INDEX_FAKE_HOST:
            case self::LABEL_INDEX_EMPTY_DATABASE:
            case self::LABEL_INDEX_FAKE_CHARSET:
            case self::LABEL_INDEX_EMPTY_USERNAME:
            case self::LABEL_INDEX_EMPTY_PASSWORD:
            default:
                $set_database_config->with($config)->willThrowException(new InvalidArgumentException());
                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->loadDatabaseConfig($config);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->loadDatabaseConfig($config);
                break;
        }
    }

    /**
     * @dataProvider setAvailableDriver
     * @param $case
     * @param $value
     */
    public function testSetDriver($case, $value)
    {
        $set_driver = $this->mockEntity->method('setDriver');
        $get_driver = $this->mockEntity->method('getDriver');
        switch ($case) {
            case self::LABEL_INDEX_REAL:
                $set_driver->with($value)->willReturn(true);
                $get_driver->willReturn($value);

                static::assertTrue($this->mockEntity->setDriver($value));
                static::assertEquals(
                    $value,
                    $this->mockEntity->getDriver()
                );

                static::assertTrue($this->configEntity->setDriver($value));
                static::assertEquals(
                    $value,
                    $this->configEntity->getDriver()
                );
                break;
            case self::LABEL_INDEX_DUMMY:
                $set_driver->with($value)->willThrowException(new InvalidArgumentException());
                $get_driver->willReturn($value);

                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->setDriver($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setDriver($value);
                break;
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_driver->with($value)->willThrowException(new InvalidArgumentException());
                $get_driver->willReturn(null);

                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->setDriver($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setDriver($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableHost
     * @param $case
     * @param $value
     */
    public function testSetHost($case, $value)
    {
        $set_host = $this->mockEntity->method('sethost');
        $get_host = $this->mockEntity->method('gethost');
        switch ($case) {
            case self::LABEL_INDEX_REAL:
                $set_host->with($value)->willReturn(true);
                $get_host->willReturn($value);

                static::assertTrue($this->mockEntity->setHost($value));
                static::assertMatchesRegularExpression(
                    $this->regexHost,
                    $this->mockEntity->getHost()
                );

                static::assertTrue($this->configEntity->setHost($value));
                static::assertMatchesRegularExpression(
                    $this->regexHost,
                    $this->configEntity->getHost()
                );
                break;
            case self::LABEL_INDEX_DUMMY:
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_host->with($value)->willThrowException(new InvalidArgumentException());
                $get_host->willReturn(null);

                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->setHost($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setHost($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableDatabase
     * @param $case
     * @param $value
     */
    public function testSetDatabase($case, $value)
    {
        $set_database = $this->mockEntity->method('setDatabase');
        $get_database = $this->mockEntity->method('getDatabase');
        switch ($case) {
            case self::LABEL_INDEX_REAL:
                $set_database->with($value)->willReturn(true);
                $get_database->willReturn($value);

                static::assertTrue($this->mockEntity->setDatabase($value));
                static::assertEquals(
                    $value,
                    $this->mockEntity->getDatabase()
                );

                static::assertTrue($this->configEntity->setDatabase($value));
                static::assertEquals(
                    $value,
                    $this->configEntity->getDatabase()
                );
                break;
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_database->willThrowException(new InvalidArgumentException());
                $get_database->willReturn(null);

                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->setDatabase($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setDatabase($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableCharset
     * @param $case
     * @param $value
     */
    public function testSetCharset($case, $value)
    {
        $set_charset = $this->mockEntity->method('setCharset');
        $get_charset = $this->mockEntity->method('getCharset');
        switch ($case) {
            case self::LABEL_INDEX_REAL:
                $set_charset->with($value)->willReturn(true);
                $get_charset->willReturn($value);

                static::assertTrue($this->mockEntity->setCharset($value));
                static::assertEquals(
                    $value,
                    $this->mockEntity->getCharset()
                );

                static::assertTrue($this->configEntity->setCharset($value));
                static::assertEquals(
                    $value,
                    $this->configEntity->getCharset()
                );
                break;
            case self::LABEL_INDEX_EMPTY:
            case self::LABEL_INDEX_DUMMY:
            default:
                $set_charset->with($value)->willThrowException(new InvalidArgumentException());
                $get_charset->willReturn(null);

                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->setCharset($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setCharset($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailableUsername
     * @param $case
     * @param $value
     */
    public function testSetUsername($case, $value)
    {
        $set_username = $this->mockEntity->method('setUsername');
        $get_username = $this->mockEntity->method('getUsername');
        switch ($case) {
            case self::LABEL_INDEX_REAL:
                $set_username->with($value)->willReturn(true);
                $get_username->willReturn($value);

                static::assertTrue($this->mockEntity->setUsername($value));
                static::assertEquals(
                    $value,
                    $this->mockEntity->getUsername()
                );

                static::assertTrue($this->configEntity->setUsername($value));
                static::assertEquals(
                    $value,
                    $this->configEntity->getUsername()
                );
                break;
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_username->willThrowException(new InvalidArgumentException());
                $get_username->willReturn(null);

                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->setUsername($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setUsername($value);
                break;
        }
    }

    /**
     * @dataProvider setAvailablePassword
     * @param $case
     * @param $value
     */
    public function testSetPassword($case, $value)
    {
        $set_password = $this->mockEntity->method('setPassword');
        $get_password = $this->mockEntity->method('getPassword');
        switch ($case) {
            case self::LABEL_INDEX_REAL:
                $set_password->with($value)->willReturn(true);
                $get_password->willReturn($value);

                static::assertTrue($this->mockEntity->setPassword($value));
                static::assertEquals(
                    $value,
                    $this->mockEntity->getPassword()
                );

                static::assertTrue($this->configEntity->setPassword($value));
                static::assertEquals(
                    $value,
                    $this->configEntity->getPassword()
                );
                break;
            case self::LABEL_INDEX_EMPTY:
            default:
                $set_password->willThrowException(new InvalidArgumentException());
                $get_password->willReturn(null);

                $this->expectException(InvalidArgumentException::class);
                $this->configEntity->setPassword($value);

                $this->expectException(InvalidArgumentException::class);
                $this->mockEntity->setPassword($value);
                break;
        }
    }
}
