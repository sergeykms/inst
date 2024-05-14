<?php

namespace App\Application\DataBase;


use AllowDynamicProperties;
use PDO;
use PDOException;

class ConnectionDataBase
{
    private string $driver;
    private string $host;
    private string $port;
    private string $database;
    private string $password;
    private string $userDB;

    public function __construct()
    {
        if ($_SERVER['SERVER_NAME'] == 'inst') {
            $this->driver = $_ENV['LOCAL_DB_DRIVER'];
            $this->host = $_ENV['LOCAL_DB_HOST'];
            $this->port = $_ENV['LOCAL_DB_PORT'];
            $this->database = $_ENV['LOCAL_DB_DATABASE'];
            $this->userDB = $_ENV['LOCAL_DB_USER'];
            $this->password = $_ENV['LOCAL_DB_PASSWORD'];
        } else {
            $this->driver = $_ENV['REMOTE_DB_DRIVER'];
            $this->host = $_ENV['REMOTE_DB_HOST'];
            $this->port = $_ENV['REMOTE_DB_PORT'];
            $this->database = $_ENV['REMOTE_DB_DATABASE'];
            $this->userDB = $_ENV['REMOTE_DB_USER'];
            $this->password = $_ENV['REMOTE_DB_PASSWORD'];
        }
    }

    public function connect(): PDO
    {
        return new PDO("{$this->driver}:host={$this->host};dbname={$this->database};port={$this->port}", $this->userDB, $this->password);

    }
}