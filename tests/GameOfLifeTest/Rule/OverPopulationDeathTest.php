<?php

namespace GameOfLifeTest\Rule;

use GameOfLife\Rule\OverPopulationDeath;
use GameOfLife\Test\RuleTestCase;

/**
 * GameOfLifeTest\Rule\OverPopulationDeathTest
 */
class OverPopulationDeathTest extends RuleTestCase
{
    public function getRule()
    {
        return new OverPopulationDeath();
    }

    /**
     * @test
     */
    public function applyReturnsKillActionWhenNumberOfLivingNeighboursIsGreaterThan3()
    {
        $this->assertAction('Kill', 4);
        $this->assertAction('Kill', 5);
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIsNot3Or2()
    {
        $this->assertAction('Null', 1);
        $this->assertAction('Null', 2);
        $this->assertAction('Null', 3);
    }
}
