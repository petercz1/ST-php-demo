<?php
namespace chipbug\php_demo;

// drops a database - dangerous!

include '../common/class.dbConnect.php';

$user = $_GET['user'];
logger($user);

$db = new DbConnect($username, $password);
$sql = "DROP USER $user";
if ($db->conn->query($sql)) {
    logger("dropped user $user");
    echo "dropped user $user";
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}
$db->kill();
