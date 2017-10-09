<?php
namespace chipbug\php_demo;

// creates a database!

include '../common/class.dbConnect.php';

logger('testing');
$name = $_GET['user'];
$pass = $_GET['pass'];
logger("Creating $name: $pass");

$db = new DbConnect($admin_name, $admin_pass);
$sql = "CREATE USER '$name'@'localhost' IDENTIFIED BY '$pass'";

if ($db->conn->query($sql)) {
    logger("created user $user");
    echo "created user $user" ;
} else {
    echo 'whoops';
    echo $db->conn->error;
    logger($db->conn->error);
}

$db->kill();
