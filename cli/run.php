<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use GameOfLife\Board;
use GameOfLife\Cell;
use GameOfLife\GenerationGenerator;
use GameOfLife\Board\Renderer\Cli;

$numberOfGenerations = (int) 100;
$rows = (int) 50;
$columns = (int) 50;
$cells = getCells($rows, $columns);

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

$board = new Board($cells);
$renderer = new Cli();
$generationGenerator = new GenerationGenerator($board);

while (true) {
    system('clear');
    $generationGenerator->generate();
    $renderer->render($board);
    usleep(200000);
}
