<?php

namespace GameOfLifeTest\Action;

use GameOfLife\Action\Null;
use GameOfLife\Cell;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Action\NullTest
 */
class NullTest extends PHPUnit_Framework_TestCase
{
    /** @var Null */
    protected $action;

    public function setUp()
    {
        $cell = new Cell(true);
        $this->action = new Null($cell);
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
    public function doesNotChangeCellStatus()
    {
        $cell = new Cell(true);
        $this->action = new Null($cell);
        $this->action->execute();
        $this->assertTrue($cell->isAlive());

        $cell->kill();
        $this->action->execute();
        $this->assertFalse($cell->isAlive());
    }
}
