<?php

declare(strict_types=1);

namespace Tests\Config\Traits;

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
            ['real', 'mysql'],
            ['dummy', 'dummy'],
            ['empty', '']
        ];
        $this->host     = [
            ['real', '172.17.0.3'],
            ['dummy', 'dummy'],
            ['empty', '']
        ];
        $this->database = [
            ['real', 'averoes'],
            ['empty', '']
        ];
        $this->charset  = [
            ['real', 'utf8'],
            ['dummy', 'dummy'],
            ['empty', '']
        ];
        $this->username = [
            ['real', 'root'],
            ['empty', '']
        ];
        $this->password = [
            ['real', 'root'],
            ['empty', '']
        ];
        $this->databaseConfig = [
            [
                'real',
                [
                    'driver' => 'mysql',
                    'host' => '172.17.0.3',
                    'database' => 'averoes',
                    'charset' => 'utf8',
                    'username' => 'root',
                    'password' => 'root'
                ]
            ],
            [
                'fake_driver',
                [
                    'driver' => 'baboulinet',
                    'host' => '172.17.0.3',
                    'database' => 'averoes',
                    'charset' => 'utf8',
                    'username' => 'root',
                    'password' => 'root'
                ]
            ],
            [
                'fake_host',
                [
                    'driver' => 'mysql',
                    'host' => 'A172.17.0.3',
                    'database' => 'averoes',
                    'charset' => 'utf8',
                    'username' => 'root',
                    'password' => 'root'
                ]
            ],
            [
                'empty_database',
                [
                    'driver' => 'mysql',
                    'host' => '172.17.0.3',
                    'database' => '',
                    'charset' => 'utf8',
                    'username' => 'root',
                    'password' => 'root'
                ]
            ],
            [
                'fake_charset',
                [
                    'driver' => 'mysql',
                    'host' => '172.17.0.3',
                    'database' => 'averoes',
                    'charset' => 'baboulinet',
                    'username' => 'root',
                    'password' => 'root'
                ]
            ],
            [
                'empty_username',
                [
                    'driver' => 'mysql',
                    'host' => '172.17.0.3',
                    'database' => 'averoes',
                    'charset' => 'utf8',
                    'username' => '',
                    'password' => 'root'
                ]
            ],
            [
                'empty_password',
                [
                    'driver' => 'mysql',
                    'host' => '172.17.0.3',
                    'database' => 'averoes',
                    'charset' => 'utf8',
                    'username' => 'root',
                    'password' => ''
                ]
            ],
            ['empty', []]
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
