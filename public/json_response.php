<?php

use GameOfLife\Board;
use GameOfLife\Cell;
use GameOfLife\GenerationGenerator;
use GameOfLife\Board\Renderer\ToArray;

$numberOfGenerations = (int) $_POST['generations'];
$rows = (int) $_POST['rows'];
$columns = (int) $_POST['columns'];
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
$renderer = new ToArray();
$generationGenerator = new GenerationGenerator($board);
$generations = array();

for ($generation = 0; $generation < $numberOfGenerations; $generation++) {
    $generationGenerator->generate();
    $generations[] = $renderer->render($board);
}

$response = array(
    'generations' => $generations,
);

die(json_encode($response));
