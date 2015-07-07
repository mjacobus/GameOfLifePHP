<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);

require_once '../vendor/autoload.php';

if (count($_POST)) {
    require_once "json_response.php";
}

require_once "form.php";
