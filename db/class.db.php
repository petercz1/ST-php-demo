<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';

logger('making a db connection');

class Db
{
    public function conn()
    {
        try {
            $conn = new PDO("mysql:host=localhost", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE scrap2";
            // use exec() because no results are returned
            $conn->exec($sql);
            logger('Database created successfully<br>');
            echo "Database created successfully<br>";
        } catch (PDOException $e) {
            logger($e->getMessage());
            echo json_encode($e->getMessage());
        }
    }
}
