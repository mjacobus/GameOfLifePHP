<?php

namespace GameOfLifeTest\Action;

use GameOfLife\Action\Resurrect;
use GameOfLife\Cell;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Action\ResurrectTest
 */
class ResurrectTest extends PHPUnit_Framework_TestCase
{
    /** @var Cell */
    protected $cell;

    /** @var Resurrect */
    protected $action;

    public function setUp()
    {
        $this->cell = new Cell(false);
        $this->action = new Resurrect($this->cell);
    }

    /**
     * @test
     */
    public function implementsActionInterface()
    {
        $this->assertInstanceOf('GameOfLife\Action\ActionInterface', $this->action);
    }

    /**
     * @test
     */
    public function implementsAbstractClass()
    {
        $this->assertInstanceOf('GameOfLife\Action\AbstractAction', $this->action);
    }

    /**
     * @test
     */
    public function resurrectCell()
    {
        $this->action->execute();
        $this->assertTrue($this->cell->isAlive());
    }
}
