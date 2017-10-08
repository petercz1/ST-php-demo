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
        // Create connection
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Create database
$sql = "CREATE DATABASE myDB";
        if ($conn->query($sql) === true) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }

        $conn->close();
    }
}
