<?php

namespace Database;

/**
 * Class PDOConfig
 * @package Config
 */
class PDOConfig
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

    /**
     * PDOConfig constructor.
     */
    public function __construct()
    {
        $config_settings = getenv('APP_DEV_CONFIG');
        var_dump($config_settings);
        $yaml_to_array = yaml_parse_file($config_settings);
        var_dump($yaml_to_array);
        die;
        if (!empty($configData)) {
            $this->iniDatabaseConfig($yaml_to_array);
        }
    }

    /**
     * Initiate a clean database config settings with DNS et access using configuration YML file
     * @param array $configData
     */
    private function iniDatabaseConfig(array $configData): void
    {
        /*****************************
         * For DNS elements settings *
         *****************************/

        $this->setDriver($configData['dirver']);
        $this->setHost($configData['host']);
        $this->setDatabase($configData['database']);
        $this->setCharset($configData['charset']);

        /***********************
         * For database access *
         ***********************/

        $this->setUsername($configData['username']);
        $this->setPassword($configData['password']);

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
    public function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }

    /** @param string $host */
    private function setHost(string $host): void
    {
        $this->host = $host;
    }

    /** @param string $database */
    public function setDatabase(string $database): void
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
        $this->dns = $driver.':';
        $this->dns.= 'host='.$host.';';
        $this->dns.= 'dbname='.$database.';';
        $this->dns.= 'charset='.$charset;
    }
}
