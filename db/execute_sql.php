<?php
namespace \chipbug\
include 'errors.php';
include 'credentials.php';
logger('testing');
logger($_GET['sql']);
try {
    $conn = new PDO("mysql:host=localhost", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE scrap2";
    // use exec() because no results are returned
    $conn->exec($sql);
    logger('Database created successfully<br>');
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    logger($e->getMessage());
    echo json_encode($e->getMessage());
}

$conn = null;
