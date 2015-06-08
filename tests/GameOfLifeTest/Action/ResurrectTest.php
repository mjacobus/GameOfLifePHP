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
    /** @var Resurrect */
    protected $action;

    public function setUp()
    {
        $cell = new Cell(false);
        $this->action = new Resurrect($cell);
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
        $cell = $this->action->getCell();
        $this->assertTrue($cell->isAlive());
    }
}
