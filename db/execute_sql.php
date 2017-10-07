<?php
namespace chipbug\php_demo;

include 'class.db.php';
include 'errors.php';

logger('testing');
logger($_GET['sql']);

$db = new Db();
$db->conn();

$conn = null;
