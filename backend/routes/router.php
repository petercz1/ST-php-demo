<?php

include '../common/logger.php';

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

logger($url);
$routes = explode('/', $url);
logger($routes);
