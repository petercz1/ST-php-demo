<?php
namespace chipbug\php_demo;

// connects to a database and returns a connection object
require_once 'logger.php';
require_once 'credentials.php';

class DbConnect
{
    public $conn;
    public function __construct($admin_name, $admin_pass)
    {
        try {
            $conn = new mysqli($server, $admin_name, $admin_pass);
            return $this->conn;
        } catch (Exception $ex) {
            logger($ex);
        }
    }
}


// class DbConnect
// {
//     public $conn;
//     public function __construct($admin_name, $admin_pass)
//     {
//         try {
//             $this->conn = new \PDO("mysql:host=localhost", $admin_name, $admin_pass);
//             $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//             //logger("Connected successfully");
//             return $this->conn;
//         } catch (PDOException $e) {
//             logger("Connection failed: " . $e->getMessage());
//         }
//     }
//     public function kill()
//     {
//         $this->conn = null;
//         //logger('killed connection');
//     }
// }
