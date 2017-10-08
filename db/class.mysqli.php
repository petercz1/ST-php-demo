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
            return
        } catch (Exception $ex) {
            logger($ex);
        }
    }
    public function kill()
    {
        $conn->close();
    }
}
