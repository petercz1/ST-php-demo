<?php
namespace chipbug\php_demo;

// gets all databases

include 'errors.php';
include 'credentials.php';
include 'class.dbConnect.php';

$db = new DbConnect($username, $password);
$sql = "SHOW DATABASES";
$result = $db->conn->query($sql);
if ($result) {
    $output = $result->fetchAll();
    echo json_encode($output);
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}
$db->kill();
