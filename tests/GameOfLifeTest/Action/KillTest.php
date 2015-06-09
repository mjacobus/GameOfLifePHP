<?php

namespace GameOfLifeTest\Action;

use GameOfLife\Action\Kill;
use GameOfLife\Cell;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Action\KillTest
 */
class KillTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Kill
     */
    protected $action;

    /**
     * @var Cell
     */
    protected $cell;

    public function setUp()
    {
        $this->cell = new Cell();
        $this->action = new Kill($this->cell);
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
    public function killsCell()
    {
        $this->action->execute();
        $this->assertFalse($this->cell->isAlive());
    }
}
