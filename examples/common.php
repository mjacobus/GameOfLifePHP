<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use GameOfLife\Cell;

function newCell()
{
    return new Cell(rand(0, 1));
}

function getCells($rows, $columns)
{
    $cells = array();

    for ($x = 0; $x < $rows; $x++) {
        $row = array();
        for ($y = 0; $y < $columns; $y++) {
            $row[] = newCell();
        }
        $cells[] = $row;
    }

    return $cells;
}
