<?php
// creates a database!

require_once '../common/class.dbConnect.php';
sleep(1);
$name = $_GET['db'];
logger("creating database $name");

$db = new DbConnect($admin_name, $admin_pass);
$sql = "CREATE DATABASE $name";

if ($db->conn->query($sql)) {
    logger('created db'); // backend log
    echo 'created db';    // frontend log
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}

$db->kill();
