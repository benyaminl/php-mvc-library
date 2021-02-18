<?php

include_once "system/load.php";
// Load the Config
include_once "config.php";

use system\Route;

if (isset($_SERVER['PATH_INFO']) || isset($_SERVER['ORIG_PATH_INFO'])) {
    if (isset($_SERVER['ORIG_PATH_INFO'])) {
        $_SERVER['PATH_INFO'] = $_SERVER['ORIG_PATH_INFO'];
    }
} else {
    $class = "controller\\".\explode(".", $r[$method])[0];
    $function = \explode(".", $r[$method])[1];
    $obj = new $class;
    \call_user_func_array([$obj, $function], $params);
    exit;
}

$router = Route::getSingleton();
include_once "router.php";
$router->checkRoute();
