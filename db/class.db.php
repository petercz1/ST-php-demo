<?php
namespace chipbug\php_demo;

include 'credentials.php';
use PDO;

logger('making a db connection');

class Db
{
    public function create_db($name)
    {
        try {
            logger('passing ' . $name);
            global $username, $password, $servername;
            // Create connection
            $conn = new \mysqli($servername, $username, $password);

            // Create database
            $sql = "CREATE DATABASE $$name";
            $result = $conn->query($sql);
            logger($result);
            // close conn
            $conn->close();
        } catch (Exception $ex) {
            logger($ex);
            echo $ex;
        }
    }
}
