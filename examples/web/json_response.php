<?php

require_once realpath(dirname(__FILE__) . '/../common.php');

use GameOfLife\Board;
use GameOfLife\GenerationGenerator;
use GameOfLife\Board\Renderer\ToArray;

$numberOfGenerations = (int) $_POST['generations'];
$rows = (int) $_POST['rows'];
$columns = (int) $_POST['columns'];
$cells = getCells($rows, $columns);

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
