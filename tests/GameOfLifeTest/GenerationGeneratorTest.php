<?php

namespace GameOfLifeTest;

use GameOfLife\Board;
use GameOfLife\Cell;
use GameOfLife\GenerationGenerator;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\GenerationGeneratorTest
 */
class GenerationGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var GenerationGenerator */
    protected $generator;

    /** @var Cell[] */
    protected $cells;

    /** @var Board */
    protected $board;

    public function setUp()
    {
        $this->cells = $this->getCells();
        $board = new Board($this->cells);
        $this->board = $board;
        $this->generator = new GenerationGenerator($board);
    }

    private function getCells($size = 3)
    {
        $cells = array();

        for ($row = 1; $row <= $size; $row++) {
            $rowCells = array();
            for ($column = 1; $column <= $size; $column++) {
                $rowCells[] = new Cell(false);
            }
            $cells[] = $rowCells;
        }

        return $cells;
    }

    /**
     * @test
     *
     * ---    ---
     * -x- => ---
     * ---    ---
     */
    public function scenario1()
    {
        // first row
        $this->cells[0][0];
        $this->cells[0][1];
        $this->cells[0][2];
        // second row
        $this->cells[1][0];
        $this->cells[1][1]->resurrect();
        $this->cells[1][2];
        // third row
        $this->cells[2][0];
        $this->cells[2][1];
        $this->cells[2][2];

        $this->generator->generate();
        $this->assertStatuses(array(
            false,
            false,
            false,
            // second row
            false,
            false,
            false,
            // third row
            false,
            false,
            false,
        ));
    }

    /**
     * @test
     *
     * -x-    ---
     * -x- => xxx
     * -x-    ---
     */
    public function scenario2()
    {
        // first row
        $this->cells[0][0];
        $this->cells[0][1]->resurrect();
        $this->cells[0][2];
        // second row
        $this->cells[1][0];
        $this->cells[1][1]->resurrect();
        $this->cells[1][2];
        // third row
        $this->cells[2][0];
        $this->cells[2][1]->resurrect();
        $this->cells[2][2];

        $this->generator->generate();

        $this->assertStatuses(array(
            false,
            false,
            false,
            // second row
            true,
            true,
            true,
            // third row
            false,
            false,
            false,
        ));
    }

    /**
     * @test
     *
     * ----    ----
     * -xx- => -xx-
     * -xx-    -xx-
     * ----    ----
     */
    public function scenario3()
    {
        $this->cells = $this->getCells(4);
        $board = new Board($this->cells);
        $this->board = $board;
        $this->generator = new GenerationGenerator($board);

        // first row
        $this->cells[0][0];
        $this->cells[0][1];
        $this->cells[0][2];
        $this->cells[0][3];
        // second row
        $this->cells[1][0];
        $this->cells[1][1]->resurrect();
        $this->cells[1][2]->resurrect();
        $this->cells[1][3];
        // third row
        $this->cells[2][0];
        $this->cells[2][1]->resurrect();
        $this->cells[2][2]->resurrect();
        $this->cells[2][3];
        // fourth row
        $this->cells[2][0];
        $this->cells[2][1];
        $this->cells[2][2];
        $this->cells[2][3];

        $this->generator->generate();

        $this->assertStatuses(array(
            false,
            false,
            false,
            false,
            // second row
            false,
            true,
            true,
            false,
            // third row
            false,
            true,
            true,
            false,
            // fourth row
            false,
            false,
            false,
            false,
        ));
    }

    private function assertStatuses($statuses)
    {
        $cells = $this->board->getCells();
        $messageTemplate = 'failed asserting that cell %s is %s';

        foreach ($statuses as $index => $status) {
            $alive = $cells[$index]->isAlive();
            $statusString = $status ? 'ALIVE' : 'DEAD';
            $message = sprintf($messageTemplate, $index, $statusString);
            $this->assertEquals($status, $alive, $message);
        }
    }
}
