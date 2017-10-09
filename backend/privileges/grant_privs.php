<?php
namespace chipbug\php_demo;

// creates a user!

include '../common/class.dbConnect.php';

logger('testing');
$user = $_GET['user'];
$pass = $_GET['pass'];
logger("Creating user $user with password of $pass");

$db = new DbConnect($admin_name, $admin_pass);
$sql = "CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass'";

if ($db->conn->query($sql)) {
    logger("created user $user");
    echo "created user $user" ;
} else {
    echo 'whoops';
    echo $db->conn->error;
    logger($db->conn->error);
}

$db->kill();
