<?php

include '../common/errors.php';

$uri = 'dd';
$router = array();

$router['home'] = function () {
    echo '<h1>home page</h1>';
};

$router['databases'] = function () {
    echo 'doing database stuff...';
};

if (isset($router[$uri])) {
    $router[$uri]();
} else {
    echo '<h1>404 not found. sorry about that...</h1>';
}
