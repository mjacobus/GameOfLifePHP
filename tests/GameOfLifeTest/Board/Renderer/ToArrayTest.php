<?php

namespace GameOfLifeTest\Board\Renderer;

use GameOfLife\Board;
use GameOfLife\Board\Renderer\ToArray;
use GameOfLife\Cell;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Board\Renderer\ToArrayTest
 */
class ToArrayTest extends PHPUnit_Framework_TestCase
{
    /** @var ToArray */
    protected $renderer;

    public function setUp()
    {
        $this->renderer = new ToArray();
    }

    /**
     * @test
     */
    public function canRenderABoard()
    {
        $board = new Board(
            array(
                array(new Cell(true), new Cell(false)),
                array(new Cell(false), new Cell(true)),
            )
        );

        $expected = array(
            array(true, false),
            array(false, true),
        );

        $rendered = $this->renderer->render($board);
        $this->assertEquals($expected, $rendered);
    }
}
