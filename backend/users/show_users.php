<?php
namespace chipbug\php_demo;

// gets all databases

include '../common/class.dbConnect.php';

$db = new DbConnect($username, $password);
$sql = "SELECT User FROM mysql.user;";
$result = $db->conn->query($sql);
if ($result) {
    $output = $result->fetchAll();
    echo json_encode($output);
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}
$db->kill();