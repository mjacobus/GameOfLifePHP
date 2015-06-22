<?php

namespace GameOfLifeTest;

use PHPUnit_Framework_TestCase;
use GameOfLife\Board;

/**
 * GameOfLifeTest\BoardTest
 */
class BoardTest extends PHPUnit_Framework_TestCase
{
    /** @var Board */
    protected $board;

    public function setUp()
    {
        $this->board = new Board();
    }

    /**
     * @test
     */
    public function getCells()
    {
        $this->markTestIncomplete();
    }
}
