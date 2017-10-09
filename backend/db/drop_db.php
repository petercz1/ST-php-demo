<?php
namespace chipbug\php_demo;

// drops a database - dangerous!

include '../common/class.dbConnect.php';

$name = $_GET['db'];
logger("dropping database $name");

$db = new DbConnect($admin_name, $admin_pass);
$sql = "DROP DATABASE $name";

if ($db->conn->query($sql)) {
    logger('dropped db');
    echo 'dropped db';
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}

$db->kill();
