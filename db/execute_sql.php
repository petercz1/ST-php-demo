<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.dbconnect.php';

logger('testing');
logger($_GET['sql']);
$name = $_GET['sql'];
try {
    $db = new DbConnect($username, $password);
    $sql = 'CREATE DATABASE $name';
    $db->$conn->exec($sql);
} catch (Exception $ex) {
    logger($ex);
    echo $ex;
}
