<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.mysqli.php';

logger('testing');
logger($_GET['db']);
$name = $_GET['db'];

$db = new DbConnect($username, $password);
$sql = "CREATE DATABASE $name";
if ($db->conn->query($sql)) {
} else {
    logger($db->conn->error);
}
$db->kill();

echo 'created...';
