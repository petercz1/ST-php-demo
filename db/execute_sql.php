<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'credentials.php';
include 'class.mysqli.php';

logger('testing');
logger($_GET['sql']);
$name = $_GET['sql'];

$db = new DbConnect($username, $password);
$sql = "CREATE DATABASE $name";
$db->conn->exec($sql);
$db->kill();
