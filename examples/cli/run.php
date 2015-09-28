<?php

require_once realpath(dirname(__FILE__) . '/../common.php');

use GameOfLife\Board;
use GameOfLife\Cell;
use GameOfLife\GenerationGenerator;
use GameOfLife\Board\Renderer\Cli;

$numberOfGenerations = (int) 100;
$columns = (int) 100;
$rows = (int) 80;
$cells = getCells($rows, $columns);

$board = new Board($cells);
$renderer = new Cli();
$generationGenerator = new GenerationGenerator($board);

while (true) {
    system('clear');
    $generationGenerator->generate();
    $renderer->render($board);
    usleep(200000);
}
