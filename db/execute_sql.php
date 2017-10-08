<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.dbconnect.php';

logger('testing');
logger($_GET['sql']);
try {
} catch (Exception $ex) {
    logger($ex);
    echo $ex;
}
$db = new DbConnect($username, $password);
$sql = 'CREATE DATABASE test2';
$db->exec($sql);
