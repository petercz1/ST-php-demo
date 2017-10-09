<?php
namespace chipbug\php_demo;

// connects to a database and returns a connection object
include 'errors.php';
include 'credentials.php';

class DbConnect
{
    public $conn;
    public function __construct($admin_name, $admin_pass)
    {
        try {
            $this->conn = new \PDO("mysql:host=localhost", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            logger("Connected successfully");
            return $this->conn;
        } catch (PDOException $e) {
            logger("Connection failed: " . $e->getMessage());
        }
    }
    public function kill()
    {
        $this->conn = null;
        logger('killed connection');
    }
}
