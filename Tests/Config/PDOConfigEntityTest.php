<?php

declare(strict_types=1);

namespace Tests\Config;

use Config\PDOConfigEntity;
use InvalidArgumentException;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Config\Traits\AvailableConfigDataTrait;
use TypeError;

/**
 * Class PDOConfigEntityTest
 * @package Tests\Config
 */
class PDOConfigEntityTest extends TestCase
{
    use AvailableConfigDataTrait {
        AvailableConfigDataTrait::__construct as availableConfigData;
    }

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
            case 'real':
                $set_database_config->with($config)->willReturn(true);
                static::assertThat(
                    $this->mockEntity->loadDatabaseConfig($config),
                    new IsTrue()
                );
                static::assertThat(
                    $this->configEntity->loadDatabaseConfig($config),
                    new IsTrue()
                );

                $get_dns->willReturn($this->configEntity->getDns());
                static::assertIsString($this->mockEntity->getDns());
                static::assertIsString($this->configEntity->getDns());
                break;

            case 'fake_driver':
            case 'fake_host':
            case 'empty_database':
            case 'fake_charset':
            case 'empty_username':
            case 'empty_password':
            case 'empty':
                $set_database_config->with($config)->willThrowException(new InvalidArgumentException());
                static::expectException(InvalidArgumentException::class);
                $this->configEntity->loadDatabaseConfig($config);

                static::expectException(InvalidArgumentException::class);
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
            case 'real':
                $set_driver->with($value)->willReturn(true);
                $get_driver->willReturn($value);

                static::assertThat(
                    $this->mockEntity->setDriver($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->mockEntity->getDriver()
                );

                static::assertThat(
                    $this->configEntity->setDriver($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->configEntity->getDriver()
                );
                break;

            case 'dummy':
                $set_driver->with($value)->willThrowException(new InvalidArgumentException());
                $get_driver->willReturn($value);

                static::expectException(InvalidArgumentException::class);
                $this->configEntity->setDriver($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setDriver($value);
                break;

            case 'empty':
                $set_driver->with($value)->willThrowException(new InvalidArgumentException());
                $get_driver->willReturn(null);

                static::expectException(InvalidArgumentException::class);
                $this->configEntity->setDriver($value);

                static::expectException(InvalidArgumentException::class);
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
            case 'real':
                $set_host->with($value)->willReturn(true);
                $get_host->willReturn($value);

                static::assertThat(
                    $this->mockEntity->setHost($value),
                    new IsTrue()
                );
                static::assertMatchesRegularExpression(
                    $this->regexHost,
                    $this->mockEntity->getHost()
                );

                static::assertThat(
                    $this->configEntity->setHost($value),
                    new IsTrue()
                );
                static::assertMatchesRegularExpression(
                    $this->regexHost,
                    $this->configEntity->getHost()
                );
                break;

            case 'dummy':
                $set_host->with($value)->willThrowException(new InvalidArgumentException());
                $get_host->willReturn(null);

                static::expectException(InvalidArgumentException::class);
                $this->configEntity->setHost($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setHost($value);
                break;

            case 'empty':
                $set_host->with($value)->willThrowException(new TypeError());
                $get_host->willReturn(null);

                static::expectException(TypeError::class);
                $this->configEntity->setHost($value);

                static::expectException(TypeError::class);
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
            case 'real':
                $set_database->with($value)->willReturn(true);
                $get_database->willReturn($value);

                static::assertThat(
                    $this->mockEntity->setDatabase($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->mockEntity->getDatabase()
                );

                static::assertThat(
                    $this->configEntity->setDatabase($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->configEntity->getDatabase()
                );
                break;

            case 'empty':
                $set_database->willThrowException(new InvalidArgumentException());
                $get_database->willReturn(null);

                static::expectException(InvalidArgumentException::class);
                $this->configEntity->setDatabase($value);

                static::expectException(InvalidArgumentException::class);
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
            case 'real':
                $set_charset->with($value)->willReturn(true);
                $get_charset->willReturn($value);

                static::assertThat(
                    $this->mockEntity->setCharset($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->mockEntity->getCharset()
                );

                static::assertThat(
                    $this->configEntity->setCharset($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->configEntity->getCharset()
                );
                break;

            case 'empty':
            case 'dummy':
                $set_charset->with($value)->willThrowException(new InvalidArgumentException());
                $get_charset->willReturn(null);

                static::expectException(InvalidArgumentException::class);
                $this->configEntity->setCharset($value);

                static::expectException(InvalidArgumentException::class);
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
            case 'real':
                $set_username->with($value)->willReturn(true);
                $get_username->willReturn($value);

                static::assertThat(
                    $this->mockEntity->setUsername($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->mockEntity->getUsername()
                );

                static::assertThat(
                    $this->configEntity->setUsername($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->configEntity->getUsername()
                );
                break;

            case 'empty':
                $set_username->willThrowException(new InvalidArgumentException());
                $get_username->willReturn(null);

                static::expectException(InvalidArgumentException::class);
                $this->configEntity->setUsername($value);

                static::expectException(InvalidArgumentException::class);
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
            case 'real':
                $set_password->with($value)->willReturn(true);
                $get_password->willReturn($value);

                static::assertThat(
                    $this->mockEntity->setPassword($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->mockEntity->getPassword()
                );

                static::assertThat(
                    $this->configEntity->setPassword($value),
                    new IsTrue()
                );
                static::assertEquals(
                    $value,
                    $this->configEntity->getPassword()
                );
                break;

            case 'empty':
                $set_password->willThrowException(new InvalidArgumentException());
                $get_password->willReturn(null);

                static::expectException(InvalidArgumentException::class);
                $this->configEntity->setPassword($value);

                static::expectException(InvalidArgumentException::class);
                $this->mockEntity->setPassword($value);
                break;
        }
    }

    /** @return array */
    public function setAvailableDriver()
    {
        return $this->driver;
    }

    /** @return array */
    public function setAvailableHost()
    {
        return $this->host;
    }

    /** @return array */
    public function setAvailableDatabase()
    {
        return $this->database;
    }

    /** @return array */
    public function setAvailableCharset()
    {
        return $this->charset;
    }

    /** @return array */
    public function setAvailableUsername()
    {
        return $this->username;
    }

    /** @return array */
    public function setAvailablePassword()
    {
        return $this->password;
    }

    /** @return array */
    public function setAvailableDatabaseConfig()
    {
        return $this->databaseConfig;
    }
}
