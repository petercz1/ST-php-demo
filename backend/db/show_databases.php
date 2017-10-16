<?php
namespace chipbug\php_demo;

// gets all databases

require_once '../common/class.dbConnect.php';

$db = new DbConnect($admin_name, $admin_pass);
$sql = "SHOW DATABASES";
$result = $db->conn->query($sql);

if ($result) {
    $output = $result->fetchAll();
    echo json_encode($output); // this is the magic line!
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}

$db->kill();
