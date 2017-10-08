<?php
namespace chipbug\php_demo;

class DbConnect
{
    public $conn;
    public function __construct($username, $password)
    {
        try {
            // Create connection
            $conn = new \mysqli('localhost', $username, $password);
            // Check connection
$conn->connect_error;
        } catch (Exception $ex) {
            logger($ex);
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
