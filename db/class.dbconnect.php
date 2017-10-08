<?php
namespace chipbug\php_demo;

include 'credentials.php';
logger($username);
use PDO;

class DbConnect
{
    private $username, $password;
    $this->username = $username;
    $this->password = $password;
    public function connect()
    {
        try {
            $conn = new \PDO("mysql:host=localhost", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            logger("Database connection created successfully");
            return $conn;
        } catch (PDOException $ex) {
            logger($ex->getMessage());
        }
        $conn = null;
    }
}
