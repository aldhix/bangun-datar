<?php

namespace App\Database;

use PDO;
use PDOException;

class Koneksi
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct()
    {
        $config = require __DIR__ . '/konfigurasi.php';
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
