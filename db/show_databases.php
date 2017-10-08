<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.dbConnect.php';

$db = new DbConnect($username, $password);
$sql = "SHOW DATABASES";
$result = $db->conn->query($sql);
logger($result);
if ($result) {
    $output = $result->fetchAll();
    logger($output);
    echo json_encode($output);
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}
$db->kill();
