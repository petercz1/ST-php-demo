<?php
namespace chipbug\php_demo;

include 'errors.php';
include 'class.dbconnect.php';

logger('testing');
logger($_GET['sql']);

$db = new Db();
$db->create_db($_GET['sql']);
