<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.mysqli.php';

$db = new DbConnect($username, $password);
$sql = "SHOW DATABASES";
$result = $db->conn->query($sql);
if ($result) {
    logger($result);
    echo $result;
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}
$db->kill();
