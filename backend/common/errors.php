<?php

//function log_exception(Exception $e) // for php < 7.0
function log_exception(Throwable $e) // for php => 7.0
{
    $message = "Line {$e->getLine()} in " . basename($e->getFile()) . ", {$e->getMessage()}  (" . get_class($e) . ")";
    prepend_message($message);
    exit();
}

function logger($message)
{
    $debug_arr = debug_backtrace();
    $prepend = 'line ' . $debug_arr[0]['line'] . ' ('. basename($debug_arr[0]['file']) .') ' . print_r($message, true) . PHP_EOL;
    prepend_message($prepend);
}

function log_error($num, $str, $file, $line, $context = null)
{
    log_exception(new ErrorException($str, 0, $num, $file, $line));
}

function check_for_fatal()
{
    $error = error_get_last();
    if ($error["type"] == E_ERROR) {
        log_error($error["type"], $error["message"], $error["file"], $error["line"]);
    }
}

function prepend_message($message)
{
    $fileContents = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/backend/common/notices.log");
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/backend/common/notices.log", $message.$fileContents);
}

register_shutdown_function("check_for_fatal");
set_error_handler("log_error");
set_exception_handler("log_exception");
ini_set("display_errors", "on");
error_reporting(E_ALL);
