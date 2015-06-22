<?php

$autoloader = require_once dirname(__FILE__) . '/../vendor/autoload.php';

require_once 'RuleTestCase.php';

if ($autoloader instanceof \Composer\Autoload\ClassLoader) {
    $autoloader->register();
}
