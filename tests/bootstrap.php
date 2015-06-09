<?php

$autoloader = require_once dirname(__FILE__) . '/../vendor/autoload.php';

if ($autoloader instanceof \Composer\Autoload\ClassLoader) {
    $autoloader->register();
}

use GameOfLife\Cell;

function createCell($numberOfAliveNeighbours)
{
    $cell = new Cell();

    for ($i = 1; $i <= $numberOfAliveNeighbours; $i++) {
        $cell->addNeighbour(new Cell(true));
    }

    return $cell;
}
