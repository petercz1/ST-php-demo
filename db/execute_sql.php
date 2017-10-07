<?php
namespace chipbug\php_demo;

include 'class.db.php';


use \chipbug\php_demo\Db;

include 'errors.php';
include 'credentials.php';

logger('testing');
logger($_GET['sql']);

$db = new Db();
$db->conn();

$conn = null;
