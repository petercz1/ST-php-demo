<?php

// drops a user - dangerous!

include '../common/class.dbConnect.php';

$user = $_GET['user'];
logger("dropping user $user");

$db = new DbConnect($admin_name, $admin_pass);
$sql = "DROP USER $user@'localhost'";

if ($db->conn->query($sql)) {
    logger("dropped user $user");
    echo "dropped user $user";
} else {
    logger($db->conn->error);
    echo $db->conn->error;
}

$db->kill();
