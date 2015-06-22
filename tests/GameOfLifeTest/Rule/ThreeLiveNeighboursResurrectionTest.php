<?php

namespace GameOfLifeTest\Rule;

use GameOfLife\Rule\ThreeLiveNeighboursResurrection;
use GameOfLife\Test\RuleTestCase;

/**
 * GameOfLifeTest\Rule\ThreeLiveNeighboursResurrectionTest
 */
class ThreeLiveNeighboursResurrectionTest extends RuleTestCase
{
    public function getRule()
    {
        return new ThreeLiveNeighboursResurrection();
    }

    /**
     * @test
     */
    public function applyReturnRessurectActionWhenNumberOfNeighboursIs2()
    {
        $this->assertAction('Resurrect', 3);
    }

    /**
     * @test
     */
    public function applyReturnsNullActionWhenCellDoesNotHave3LiveNeighbours()
    {
        $this->assertAction('NullAction', 1);
        $this->assertAction('NullAction', 2);
        $this->assertAction('NullAction', 4);
    }
}
