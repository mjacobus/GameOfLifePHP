<?php

namespace GameOfLifeTest;

use GameOfLife\Board;
use GameOfLife\Cell;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\BoardTest
 */
class BoardTest extends PHPUnit_Framework_TestCase
{
    /** @var Board */
    protected $board;
    /** @var [Cell[]] */
    protected $cells;

    public function setUp()
    {
        $this->cells = $this->getCells();
        $this->board = new Board($this->cells);
    }

    private function getCells()
    {
        return array(
            array(new Cell(), new Cell(), new Cell()),
            array(new Cell(), new Cell(), new Cell()),
            array(new Cell(), new Cell(), new Cell()),
        );
    }

    /**
     * @test
     */
    public function setNeighboursCorrectly()
    {
        $cell = $this->cells[0][0];
        $expected = array(
            $this->cells[0][1],
            $this->cells[1][0],
            $this->cells[1][1],
        );

        $actual = $cell->getNeighbours();
        $this->assertEquals($expected, $actual);

        $cell = $this->cells[1][1];
        $expected = array(
            $this->cells[0][0],
            $this->cells[0][1],
            $this->cells[0][2],
            $this->cells[1][0],
            $this->cells[1][2],
            $this->cells[2][0],
            $this->cells[2][1],
            $this->cells[2][2],
        );

        $actual = $cell->getNeighbours();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function itCanGetCells()
    {
        $cells = array(
            $this->cells[0][0],
            $this->cells[0][1],
            $this->cells[0][2],
            $this->cells[1][0],
            $this->cells[1][1],
            $this->cells[1][2],
            $this->cells[2][0],
            $this->cells[2][1],
            $this->cells[2][2],
        );
        $this->assertEquals($cells, $this->board->getCells());
    }

    /**
     * @test
     */
    public function toArray()
    {
        $cells = $this->getCells();
        $this->board = new Board($cells);
        $this->assertEquals($cells, $this->board->toArray());
    }
}
