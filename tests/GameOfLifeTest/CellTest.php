<?php

namespace GameOfLifeTest;

use PHPUnit_Framework_TestCase;
use GameOfLife\Cell;

/**
 * GameOfLifeTest\CellTest
 */
class CellTest extends PHPUnit_Framework_TestCase
{
    /** @var Cell */
    protected $cell;

    public function setUp()
    {
        $this->cell = new Cell(true);
    }

    /**
     * @test
     */
    public function isAlive()
    {
        $this->assertTrue($this->cell->isAlive());
    }

    /**
     * @test
     */
    public function aCellCanBeInitiallyDead()
    {
        $cell = new Cell(false);
        $this->assertFalse($cell->isAlive());
    }

    /**
     * @test
     */
    public function aCellCanBeKilled()
    {
        $this->cell->kill();
        $this->assertFalse($this->cell->isAlive());
    }

    /**
     * @test
     */
    public function canAddNeighbour()
    {
        $cell = new Cell();
        $this->cell->addNeighbour($cell);
        $this->assertEquals(array($cell), $this->cell->getNeighbours());
    }

    /**
     * @test
     */
    public function canSetNeighbours()
    {
        $cell = new Cell();
        $this->cell->setNeighbours(array($cell));
        $this->assertEquals(array($cell), $this->cell->getNeighbours());
    }
}

