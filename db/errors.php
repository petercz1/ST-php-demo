<?php

/**
* Error handler, passes flow over the exception logger with new ErrorException.
*/
function log_error($num, $str, $file, $line, $context = null)
{
    log_exception(new ErrorException($str, 0, $num, $file, $line));
}

/**
* Uncaught exception handler.
*/
function log_exception(Exception $e)
{
    global $config;
    $message = "Line {$e->getLine()} in " . basename($e->getFile()) . ", {$e->getMessage()}  (" . get_class($e) . ")";

    file_put_contents($config["app_dir"] . "./notices.log", $message . PHP_EOL, FILE_APPEND);
    header("Location: {$config["error_page"]}");
    exit();
}

/**
* Checks for a fatal error, work around for set_error_handler not working on fatal errors.
*/
function check_for_fatal()
{
    $error = error_get_last();
    if ($error["type"] == E_ERROR) {
        log_error($error["type"], $error["message"], $error["file"], $error["line"]);
    }
}

register_shutdown_function("check_for_fatal");
set_error_handler("log_error");
set_exception_handler("log_exception");
ini_set("display_errors", "on");
error_reporting(E_ALL);
