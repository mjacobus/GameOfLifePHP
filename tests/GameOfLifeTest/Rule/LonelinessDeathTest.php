<?php

namespace GameOfLifeTest\Rule;

use GameOfLife\Rule\LonelinessDeath;
use GameOfLife\Test\RuleTestCase;

/**
 * GameOfLifeTest\Rule\LonelinessDeathTest
 */
class LonelinessDeathTest extends RuleTestCase
{
    public function getRule()
    {
        return new LonelinessDeath();
    }

    /**
     * @test
     */
    public function applyReturnsKillActionWhenNumberOfNeighboursIsLessThan3()
    {
        $this->assertAction('Kill', 1);
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIsNot3Or2()
    {
        $this->assertAction('Null', 2);
    }
}
