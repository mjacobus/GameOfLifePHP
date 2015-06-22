<?php

namespace GameOfLifeTest\Action;

use GameOfLife\Action\NullAction;
use GameOfLife\Cell;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Action\NullTest
 */
class NullTest extends PHPUnit_Framework_TestCase
{
    /** @var NullAction */
    protected $action;

    public function setUp()
    {
        $cell = new Cell(true);
        $this->action = new NullAction($cell);
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
        $this->action = new NullAction($cell);
        $this->action->execute();
        $this->assertTrue($cell->isAlive());

        $cell->kill();
        $this->action->execute();
        $this->assertFalse($cell->isAlive());
    }
}
