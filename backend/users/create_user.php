<?php
namespace chipbug\php_demo;

// creates a database!

include '../common/class.dbConnect.php';

logger('testing');
$name = $_GET['user'];
$pass = $_GET['pass'];
logger($name . ': ' . $pass);

$db = new DbConnect($admin_name, $admin_pass);
$sql = "CREATE DATABASE $name";
if ($db->conn->query($sql)) {
    logger('created db');
    echo 'created db';
} else {
    echo 'whoops';
    echo $db->conn->error;
    logger($db->conn->error);
}
$db->kill();
