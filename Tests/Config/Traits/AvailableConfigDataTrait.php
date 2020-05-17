<?php

declare(strict_types=1);

namespace Tests\Config\Traits;

use Config\PDOConfigEntity;
use Tests\Config\PDOConfigEntityTest;

/**
 * Trait AvailableConfigDataTrait
 * @package Tests\Config\Traits
 */
trait AvailableConfigDataTrait
{
    /** @var string $regexHost */
    public string $regexHost;

    /** @var array $driver */
    public array $driver = [];

    /** @var array $host */
    public array $host = [];

    /** @var array $database */
    public array $database = [];

    /** @var array $charset */
    public array $charset = [];

    /** @var array $username */
    public array $username = [];

    /** @var array $password */
    public array $password = [];

    /** @var array $databaseConfig */
    public array $databaseConfig = [];

    public function __construct()
    {
        $this->regexHost  = '/\b(?:(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9])\.';
        $this->regexHost .= '(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9])\.';
        $this->regexHost .= '(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9])\.';
        $this->regexHost .= '(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9]))\b/s';

        $this->driver   = [
            [PDOConfigEntityTest::LABEL_INDEX_REAL, PDOConfigEntityTest::LABEL_REAL_DRIVER],
            [PDOConfigEntityTest::LABEL_INDEX_DUMMY, 'dummy1'],
            [PDOConfigEntityTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->host     = [
            [PDOConfigEntityTest::LABEL_INDEX_REAL, PDOConfigEntityTest::LABEL_REAL_HOST],
            [PDOConfigEntityTest::LABEL_INDEX_DUMMY, 'dummy2'],
            [PDOConfigEntityTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->database = [
            [PDOConfigEntityTest::LABEL_INDEX_REAL, PDOConfigEntityTest::LABEL_REAL_DATABASE],
            [PDOConfigEntityTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->charset  = [
            [PDOConfigEntityTest::LABEL_INDEX_REAL, PDOConfigEntityTest::LABEL_REAL_CHARSET],
            [PDOConfigEntityTest::LABEL_INDEX_DUMMY, 'dummy3'],
            [PDOConfigEntityTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->username = [
            [PDOConfigEntityTest::LABEL_INDEX_REAL, PDOConfigEntityTest::LABEL_REAL_USERNAME],
            [PDOConfigEntityTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->password = [
            [PDOConfigEntityTest::LABEL_INDEX_REAL, PDOConfigEntityTest::LABEL_REAL_PASSWORD],
            [PDOConfigEntityTest::LABEL_INDEX_EMPTY, '']
        ];
        $this->databaseConfig = [
            [
                PDOConfigEntityTest::LABEL_INDEX_REAL,
                [
                    PDOConfigEntity::LABEL_DRIVER   => PDOConfigEntityTest::LABEL_REAL_DRIVER,
                    PDOConfigEntity::LABEL_HOST     => PDOConfigEntityTest::LABEL_REAL_HOST,
                    PDOConfigEntity::LABEL_DATABASE => PDOConfigEntityTest::LABEL_REAL_DATABASE,
                    PDOConfigEntity::LABEL_CHARSET  => PDOConfigEntityTest::LABEL_REAL_CHARSET,
                    PDOConfigEntity::LABEL_USERNAME => PDOConfigEntityTest::LABEL_REAL_USERNAME,
                    PDOConfigEntity::LABEL_PASSWORD => PDOConfigEntityTest::LABEL_REAL_PASSWORD
                ]
            ],
            [
                PDOConfigEntityTest::LABEL_INDEX_FAKE_DRIVER,
                [
                    PDOConfigEntity::LABEL_DRIVER   => 'baboulinet',
                    PDOConfigEntity::LABEL_HOST     => PDOConfigEntityTest::LABEL_REAL_HOST,
                    PDOConfigEntity::LABEL_DATABASE => PDOConfigEntityTest::LABEL_REAL_DATABASE,
                    PDOConfigEntity::LABEL_CHARSET  => PDOConfigEntityTest::LABEL_REAL_CHARSET,
                    PDOConfigEntity::LABEL_USERNAME => PDOConfigEntityTest::LABEL_REAL_USERNAME,
                    PDOConfigEntity::LABEL_PASSWORD => PDOConfigEntityTest::LABEL_REAL_PASSWORD
                ]
            ],
            [
                PDOConfigEntityTest::LABEL_INDEX_FAKE_HOST,
                [
                    PDOConfigEntity::LABEL_DRIVER   => PDOConfigEntityTest::LABEL_REAL_DRIVER,
                    PDOConfigEntity::LABEL_HOST     => 'A172.17.0.3',
                    PDOConfigEntity::LABEL_DATABASE => PDOConfigEntityTest::LABEL_REAL_DATABASE,
                    PDOConfigEntity::LABEL_CHARSET  => PDOConfigEntityTest::LABEL_REAL_CHARSET,
                    PDOConfigEntity::LABEL_USERNAME => PDOConfigEntityTest::LABEL_REAL_USERNAME,
                    PDOConfigEntity::LABEL_PASSWORD => PDOConfigEntityTest::LABEL_REAL_PASSWORD
                ]
            ],
            [
                PDOConfigEntityTest::LABEL_INDEX_EMPTY_DATABASE,
                [
                    PDOConfigEntity::LABEL_DRIVER   => PDOConfigEntityTest::LABEL_REAL_DRIVER,
                    PDOConfigEntity::LABEL_HOST     => PDOConfigEntityTest::LABEL_REAL_HOST,
                    PDOConfigEntity::LABEL_DATABASE => '',
                    PDOConfigEntity::LABEL_CHARSET  => PDOConfigEntityTest::LABEL_REAL_CHARSET,
                    PDOConfigEntity::LABEL_USERNAME => PDOConfigEntityTest::LABEL_REAL_USERNAME,
                    PDOConfigEntity::LABEL_PASSWORD => PDOConfigEntityTest::LABEL_REAL_PASSWORD,
                ]
            ],
            [
                PDOConfigEntityTest::LABEL_INDEX_FAKE_CHARSET,
                [
                    PDOConfigEntity::LABEL_DRIVER   => PDOConfigEntityTest::LABEL_REAL_DRIVER,
                    PDOConfigEntity::LABEL_HOST     => PDOConfigEntityTest::LABEL_REAL_HOST,
                    PDOConfigEntity::LABEL_DATABASE => PDOConfigEntityTest::LABEL_REAL_DATABASE,
                    PDOConfigEntity::LABEL_CHARSET  => 'baboulinet',
                    PDOConfigEntity::LABEL_USERNAME => PDOConfigEntityTest::LABEL_REAL_USERNAME,
                    PDOConfigEntity::LABEL_PASSWORD => PDOConfigEntityTest::LABEL_REAL_PASSWORD
                ]
            ],
            [
                PDOConfigEntityTest::LABEL_INDEX_EMPTY_USERNAME,
                [
                    PDOConfigEntity::LABEL_DRIVER   => PDOConfigEntityTest::LABEL_REAL_DRIVER,
                    PDOConfigEntity::LABEL_HOST     => PDOConfigEntityTest::LABEL_REAL_HOST,
                    PDOConfigEntity::LABEL_DATABASE => PDOConfigEntityTest::LABEL_REAL_DATABASE,
                    PDOConfigEntity::LABEL_CHARSET  => PDOConfigEntityTest::LABEL_REAL_CHARSET,
                    PDOConfigEntity::LABEL_USERNAME => '',
                    PDOConfigEntity::LABEL_PASSWORD => PDOConfigEntityTest::LABEL_REAL_PASSWORD
                ]
            ],
            [
                PDOConfigEntityTest::LABEL_INDEX_EMPTY_PASSWORD,
                [
                    PDOConfigEntity::LABEL_DRIVER   => PDOConfigEntityTest::LABEL_REAL_DRIVER,
                    PDOConfigEntity::LABEL_HOST     => PDOConfigEntityTest::LABEL_REAL_HOST,
                    PDOConfigEntity::LABEL_DATABASE => PDOConfigEntityTest::LABEL_REAL_DATABASE,
                    PDOConfigEntity::LABEL_CHARSET  => PDOConfigEntityTest::LABEL_REAL_CHARSET,
                    PDOConfigEntity::LABEL_USERNAME => PDOConfigEntityTest::LABEL_REAL_USERNAME,
                    PDOConfigEntity::LABEL_PASSWORD => ''
                ]
            ],
            [PDOConfigEntityTest::LABEL_INDEX_EMPTY, []]
        ];
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
