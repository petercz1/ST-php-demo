<?php
namespace chipbug\php_demo;

// creates a database!

include 'errors.php';
include 'credentials.php';
include 'class.dbConnect.php';

logger('testing');
logger($_GET['db']);
$name = $_GET['db'];

$db = new DbConnect($username, $password);
$sql = "CREATE DATABASE $name";
if ($db->conn->query($sql)) {
    logger('created db');
    echo 'created db';
} else {
    echo $db->conn->error;
    logger($db->conn->error);
}
$db->kill();
