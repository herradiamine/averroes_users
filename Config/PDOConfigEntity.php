<?php

namespace Config;

use Exception;

/**
 * Class PDOConfig
 * @package Config
 */
class PDOConfigEntity
{
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

    /** @var array $yamlConfig */
    private array $yamlConfig;

    /**
     * PDOConfig constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $config_settings  = getenv('APP_DEV_CONFIG');
        $this->yamlConfig = yaml_parse_file($config_settings);
        $this->yamlConfig = $this->yamlConfig['database_configuration'];
        $this->loadDatabaseConfig($this->yamlConfig);
    }

    /**
     * Initiate a clean database config settings with DNS and access using configuration YML file
     * @param array $configData
     * @throws Exception
     */
    private function loadDatabaseConfig(array $configData): void
    {
        /*****************************
         * For DNS elements settings *
         *****************************/

        if (array_key_exists('driver', $configData)) {
            $this->setDriver($configData['driver']);
        } else {
            throw new Exception('Database driver is missing');
        }

        if (array_key_exists('host', $configData)) {
            $this->setHost($configData['host']);
        } else {
            throw new Exception('Database host is missing');
        }

        if (array_key_exists('database', $configData)) {
            $this->setDatabase($configData['database']);
        } else {
            throw new Exception('Database name is missing');
        }

        if (array_key_exists('charset', $configData)) {
            $this->setCharset($configData['charset']);
        } else {
            throw new Exception('Database charset is missing');
        }

        /***********************
         * For database access *
         ***********************/

        if (array_key_exists('username', $configData)) {
            $this->setUsername($configData['username']);
        } else {
            throw new Exception('Database username is missing');
        }

        if (array_key_exists('password', $configData)) {
            $this->setPassword($configData['password']);
        } else {
            throw new Exception('Database password is missing');
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
    }

    /** @param string $driver */
    private function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }

    /** @param string $host */
    private function setHost(string $host): void
    {
        $this->host = $host;
    }

    /** @param string $database */
    private function setDatabase(string $database): void
    {
        $this->database = $database;
    }

    /** @param string $charset */
    private function setCharset(string $charset): void
    {
        $this->charset = $charset;
    }

    /** @return string */
    public function getUsername(): string
    {
        return $this->username;
    }

    /** @param string $username */
    private function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /** @return string */
    public function getPassword(): string
    {
        return $this->password;
    }

    /** @param string $password */
    private function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Allows a clean way to get DNS after construction
     * @return string
     */
    public function getDns(): string
    {
        return $this->dns;
    }

    /**
     * Concats all DNS configuration setting in one string
     * @param string $driver
     * @param string $host
     * @param string $database
     * @param string $charset
     */
    private function setDns(
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
