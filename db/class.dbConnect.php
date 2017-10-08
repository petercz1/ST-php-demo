<?php
namespace chipbug\php_demo;

class DbConnect
{
    public $conn;
    public function __construct($username, $password)
    {
        try {
            $conn = new PDO("mysql:host=localhost", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            logger("Connected successfully");
        } catch (PDOException $e) {
            logger("Connection failed: " . $e->getMessage());
        }
    }
}



// class DbConnect
// {
//     public $conn;
//     public function __construct($username, $password)
//     {
//         try {
//             // Create connection
//             $this->conn = new \mysqli('localhost', $username, $password);
//             logger('connected!');
//             return $this->conn;
//         } catch (Exception $ex) {
//             logger($ex);
//         }
//     }
//     public function kill()
//     {
//         $this->conn->close();
//         logger('killed connection');
//     }
// }
