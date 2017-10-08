<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.dbConnect.php';

$db = new DbConnect($username, $password);
$sql = "SELECT schema_name FROM information_schema.schemata";
$result = $db->conn->query($sql);
if ($result) {
    logger($result);
    echo json_encode($result);
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}
$db->kill();
