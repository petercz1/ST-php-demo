<?php
namespace chipbug\php_demo;

include 'credentials.php';
use PDO;

logger('making a db connection');

class Db
{
    public function conn()
    {
        global $username;
        global $password;
        try {
            $conn = new \PDO("mysql:host=localhost", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE scrap5";
            // use exec() because no results are returned
            $conn->exec($sql);
            logger("hello backend - db created successfully");
            echo "hello frontend - db created successfully";
            $conn = null;
        } catch (Exception $e) {
            logger($e->getMessage());
            echo json_encode($e->getMessage());
        }
    }
}
