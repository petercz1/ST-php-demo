<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'class.db.php';

logger('testing');
logger($_GET['sql']);

$db = new Db();
$db->conn();
