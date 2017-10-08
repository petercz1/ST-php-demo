<?php
namespace chipbug\php_demo;

include 'credentials.php';
use PDO;

logger('making a db connection');

class Db
{
    public function connect()
    {
        try{
        global $username;
        global $password;
        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Create database
        $sql = "CREATE DATABASE myDB";
        $result = $conn->query($sql);
        // close conn
        $conn->close();
    }

        catch(Exception $ex){
            logger($ex)
        }
    }
}
