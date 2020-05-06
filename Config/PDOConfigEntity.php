<?php

declare(strict_types=1);

namespace Config;

use InvalidArgumentException;

/**
 * Class PDOConfig
 * @package Config
 */
class PDOConfigEntity
{
    public const LABEL_DRIVER   = 'driver';
    public const LABEL_HOST     = 'host';
    public const LABEL_DATABASE = 'database';
    public const LABEL_CHARSET  = 'charset';
    public const LABEL_USERNAME = 'username';
    public const LABEL_PASSWORD = 'password';

    /** @var array $availableDrivers */
    public array $availableDrivers;

    /** @var array $availableCharset */
    public array $availableCharset;

    /************************
     * For dns construction *
     ************************/

    /** @var string $driver */
    private string $driver;

    /** @var string $host */
    private string $host;

    /** @var string $database */
    private string $database;

    /** @var string $charset */
    private string $charset;

    /***********************
     * For database access *
     ***********************/

    /** @var string $username */
    private string $username;

    /** @var string $password */
    private string $password;

    /** @var string $dns */
    private string $dns;

    /*************************************
     * To store yaml file parsing result *
     *************************************/

    /** @var array|null $yamlConfig */
    private ?array $yamlConfig;

    /**
     * PDOConfig constructor.
     * @codeCoverageIgnore
     * @throws InvalidArgumentException
     */
    public function __construct()
    {
        $this->availableDrivers = [
            'cubrid',
            'dblib',
            'firebird',
            'ibm',
            'informix',
            'mysql',
            'oci',
            'odbc',
            'pgsql',
            'sqlite',
            'sqlsrv',
            '4d'
        ];
        $this->availableCharset = [
            'armscii8',
            'ascii',
            'big5',
            'binary',
            'cp1250',
            'cp1251',
            'cp1256',
            'cp1257',
            'cp850',
            'cp852',
            'cp866',
            'cp932',
            'dec8',
            'eucjpms',
            'euckr',
            'gb18030',
            'gb2312',
            'gbk',
            'geostd8',
            'greek',
            'hebrew',
            'hp8',
            'keybcs2',
            'koi8r',
            'koi8u',
            'latin1',
            'latin2',
            'latin5',
            'latin7',
            'macce',
            'macroman',
            'sjis',
            'swe7',
            'tis620',
            'ucs2',
            'ujis',
            'utf16',
            'utf16le',
            'utf32',
            'utf8',
            'utf8mb4'
        ];

        $config_settings  = getenv('APP_DEV_CONFIG');
        $this->yamlConfig = ($config_settings)? yaml_parse_file($config_settings): null;
        if ($this->yamlConfig) {
            $this->yamlConfig = $this->yamlConfig['database_configuration'];
            $this->loadDatabaseConfig($this->yamlConfig);
        }
    }

    /**
     * Initiate a clean database config settings with DNS and access using configuration YML file
     * @param array $configData
     * @return true
     * @throws InvalidArgumentException
     */
    public function loadDatabaseConfig(array $configData): bool
    {
        /*****************************
         * For DNS elements settings *
         *****************************/

        if (array_key_exists(self::LABEL_DRIVER, $configData)) {
            $this->setDriver($configData[self::LABEL_DRIVER]);
        } else {
            throw new InvalidArgumentException('Database driver is missing');
        }

        if (array_key_exists(self::LABEL_HOST, $configData)) {
            $this->setHost($configData[self::LABEL_HOST]);
        } else {
            throw new InvalidArgumentException('Database host is missing');
        }

        if (array_key_exists(self::LABEL_DATABASE, $configData)) {
            $this->setDatabase($configData[self::LABEL_DATABASE]);
        } else {
            throw new InvalidArgumentException('Database name is missing');
        }

        if (array_key_exists(self::LABEL_CHARSET, $configData)) {
            $this->setCharset($configData[self::LABEL_CHARSET]);
        } else {
            throw new InvalidArgumentException('Database charset is missing');
        }

        /***********************
         * For database access *
         ***********************/

        if (array_key_exists(self::LABEL_USERNAME, $configData)) {
            $this->setUsername($configData[self::LABEL_USERNAME]);
        } else {
            throw new InvalidArgumentException('Database username is missing');
        }

        if (array_key_exists(self::LABEL_PASSWORD, $configData)) {
            $this->setPassword($configData[self::LABEL_PASSWORD]);
        } else {
            throw new InvalidArgumentException('Database password is missing');
        }

        /***************************************
         * For DNS construction using settings *
         ***************************************/

        $this->setDns(
            $this->driver,
            $this->host,
            $this->database,
            $this->charset
        );
        return true;
    }

    /** @return string|null */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     * @return bool
     * @throws InvalidArgumentException
     */
    public function setDriver(string $driver): bool
    {
        if (in_array($driver, $this->availableDrivers)) {
            $this->driver = $driver;
            return true;
        } else {
            throw new InvalidArgumentException("$driver is not a valid driver");
        }
    }

    /** @return string|null */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return true
     * @throws InvalidArgumentException
     */
    public function setHost(string $host): bool
    {
        $regex  = '/\b(?:(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9])\.';
        $regex .= '(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9])\.';
        $regex .= '(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9])\.';
        $regex .= '(25[0-5]|2[0-4][0-9]|[01]?[0-9]?[0-9]))\b/';

        $valid = preg_match_all($regex, $host);
        if ($valid) {
            $this->host = $host;
            return true;
        } else {
            throw new InvalidArgumentException("$host is not a valid IP");
        }
    }

    /** @return string|null */
    public function getDatabase(): ?string
    {
        return $this->database;
    }

    /**
     * @param string $database
     * @return bool
     * @throws InvalidArgumentException
     */
    public function setDatabase(string $database): bool
    {
        if (!empty($database)) {
            $this->database = $database;
            return true;
        } else {
            throw new InvalidArgumentException("$database is not a valid database name");
        }
    }

    /** @return string|null */
    public function getCharset(): ?string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     * @return true
     * @throws InvalidArgumentException
     */
    public function setCharset(string $charset): bool
    {
        $valid = in_array($charset, $this->availableCharset);
        if ($valid) {
            $this->charset = $charset;
            return true;
        } else {
            throw new InvalidArgumentException("$charset is not a valid charset");
        }
    }

    /** @return string|null */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return bool
     * @throws InvalidArgumentException
     */
    public function setUsername(string $username): bool
    {
        if (!empty($username)) {
            $this->username = $username;
            return true;
        } else {
            throw new InvalidArgumentException("$username is is not a valid username");
        }
    }

    /** @return string|null */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return true
     * @throws InvalidArgumentException
     */
    public function setPassword(string $password): bool
    {
        if (!empty($password)) {
            $this->password = $password;
            return true;
        } else {
            throw new InvalidArgumentException("$password is not a valid password");
        }
    }

    /**
     * Allows a clean way to get DNS after construction
     * @return string|null
     */
    public function getDns(): ?string
    {
        return $this->dns;
    }

    /**
     * Concats all DNS configuration settings in one string
     * @param string $driver
     * @param string $host
     * @param string $database
     * @param string $charset
     */
    public function setDns(
        string $driver,
        string $host,
        string $database,
        string $charset
    ): void {
        $this->dns  = $driver . ':';
        $this->dns .= 'host=' . $host . ';';
        $this->dns .= 'dbname=' . $database . ';';
        $this->dns .= 'charset=' . $charset;
    }
}
