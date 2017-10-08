<?php
namespace chipbug\php_demo;

class DbConnect
{
    public $conn;
    public function __construct($username, $password)
    {
        try {
            // Create connection
            $this->conn = new \mysqli('localhost', $username, $password);
            logger('connected!')
            return $this->conn;
        } catch (Exception $ex) {
            logger($ex);
        }
    }
    public function kill()
    {
        $conn->close();
    }
}
