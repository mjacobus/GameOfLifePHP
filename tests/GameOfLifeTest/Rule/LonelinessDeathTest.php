<?php

namespace GameOfLifeTest\Rule;

use GameOfLife\Cell;
use GameOfLife\Rule\LonelinessDeath;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Rule\LonelinessDeathTest
 */
class LonelinessDeathTest extends PHPUnit_Framework_TestCase
{
    /** @var LonelinessDeath */
    protected $rule;

    public function setUp()
    {
        $this->rule = new LonelinessDeath();
    }

    /**
     * @test
     */
    public function implementsTheCorrectInterface()
    {
        $this->assertInstanceOf('GameOfLife\Rule\RuleInterface', $this->rule);
    }

    /**
     * @test
     */
    public function applyReturnsKillActionWhenNumberOfNeighboursIsLessThan3()
    {
        $cell = new Cell();
        $cell->addNeighbour(new Cell(true));
        $cell->addNeighbour(new Cell(false));
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('GameOfLife\Action\Kill', $action);
        $this->assertSame($cell, $action->getCell());
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIsLessThan2()
    {
        $cell = new Cell();
        $cell->addNeighbour(new Cell(true));
        $cell->addNeighbour(new Cell(true));
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('GameOfLife\Action\Null', $action);
        $this->assertSame($cell, $action->getCell());
    }
}
