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
        $this->action = new Null(new Cell(true));
        $this->action->execute();
        $this->assertTrue($this->action->getCell()->isAlive());

        $this->action = new Null(new Cell(false));
        $this->action->execute();
        $this->assertFalse($this->action->getCell()->isAlive());
    }
}
