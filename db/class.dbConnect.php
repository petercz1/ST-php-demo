<?php
namespace chipbug\php_demo;

class DbConnect
{
    public $conn;
    public function __construct($username, $password)
    {
        try {
            $this->conn = new \PDO("mysql:host=localhost", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            logger("Connected successfully");
            return $this->conn;
        } catch (PDOException $e) {
            logger("Connection failed: " . $e->getMessage());
        }
    }
    public function kill()
    {
        $this->conn = null;
        logger('killed connection');
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
