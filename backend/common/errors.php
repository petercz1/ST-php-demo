<?php

function log_error($num, $str, $file, $line, $context = null)
{
    log_exception(new ErrorException($str, 0, $num, $file, $line));
}

//function log_exception(Exception $e) // for php < 7.0
function log_exception(Throwable $e) // for php > 7.0
{
    global $config;
    $message = "Line {$e->getLine()} in " . basename($e->getFile()) . ", {$e->getMessage()}  (" . get_class($e) . ")";
    file_put_contents($config["app_dir"] . "notices.log", $message . PHP_EOL, FILE_APPEND);
    //header("Location: {$config["error_page"]}");
    exit();
}

function check_for_fatal()
{
    $error = error_get_last();
    if ($error["type"] == E_ERROR) {
        log_error($error["type"], $error["message"], $error["file"], $error["line"]);
    }
}

function logger($message)
{
    global $config;
    $debug_arr = debug_backtrace();
    $fileContents = file_get_contents($config["app_dir"] . "notices.log");
    file_put_contents($config["app_dir"] . "notices.log", 'line ' . $debug_arr[0]['line'] . ' ('. basename($debug_arr[0]['file']) .') ' . print_r($message, true) . PHP_EOL, FILE_APPEND);
}

function prepend_message($message)
{
    $cache_new = $message; // this gets prepended
    $file = $config["app_dir"] . "notices.log"; // the file to which $cache_new gets prepended

    $handle = fopen($file, "r+");
    $len = strlen($cache_new);
    $final_len = filesize($file) + $len;
    $cache_old = fread($handle, $len);
    rewind($handle);
    $i = 1;
    while (ftell($handle) < $final_len) {
        fwrite($handle, $cache_new);
        $cache_new = $cache_old;
        $cache_old = fread($handle, $len);
        fseek($handle, $i * $len);
        $i++;
    }
}

register_shutdown_function("check_for_fatal");
set_error_handler("log_error");
set_exception_handler("log_exception");
ini_set("display_errors", "on");
error_reporting(E_ALL);
