<?php
namespace chipbug\php_demo;

include 'credentials.php';
use PDO;

class DbConnect
{
    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            logger("Database connection created successfully");
        } catch (PDOException $ex) {
            logger($ex->getMessage());
        }
        $conn = null;
    }
}
