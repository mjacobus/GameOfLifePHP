<?php

namespace GameOfLifeTest\Rule;

use GameOfLife\Rule\OverPopulationDeath;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Rule\OverPopulationDeathTest
 */
class OverPopulationDeathTest extends PHPUnit_Framework_TestCase
{
    /** @var OverPopulationDeath */
    protected $rule;

    public function setUp()
    {
        $this->rule = new OverPopulationDeath();
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
    public function applyReturnsKillActionWhenNumberOfLivingNeighboursIsGreaterThan3()
    {
        $cell = createCell(4);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('GameOfLife\Action\Kill', $action);
        $this->assertSame($cell, $action->getCell());
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIsNot3Or2()
    {
        $cell = createCell(3);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('GameOfLife\Action\Null', $action);
        $this->assertSame($cell, $action->getCell());
    }
}
