<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit', '1000M');

chdir(__DIR__);

require_once '../vendor/autoload.php';

if (count($_POST)) {
    try {
        require_once "json_response.php";
    } catch (\Exception $e) {
        http_response_code(500);
        throw $e;
    }
}

require_once "form.php";
