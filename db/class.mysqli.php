<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.dbconnect.php';

class DbConnect
{
    public $conn;
    public function __construct($username, $password)
    {
        // Create connection
        $conn = new mysqli('localhost', $username, $password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create database
        $sql = "CREATE DATABASE myDB";
        if ($conn->query($sql) === true) {
            logger("Database created successfully");
        } else {
            logger("Error creating database: " . $conn->error);
        }

        $conn->close();
    }
}
