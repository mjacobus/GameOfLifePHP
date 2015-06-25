<?php

namespace GameOfLifeTest\Rule;

use GameOfLife\Rule\HappyCommunityResurrection;
use GameOfLife\Test\RuleTestCase;

/**
 * GameOfLifeTest\Rule\HappyCommunityResurrectionTest
 */
class HappyCommunityResurrectionTest extends RuleTestCase
{
    public function getRule()
    {
        return new HappyCommunityResurrection();
    }

    /**
     * @test
     */
    public function applyReturnRessurectActionWhenNumberOfNeighboursIs2or3AndCellIsAlive()
    {
        $this->assertAction('Resurrect', 2);
        $this->assertAction('Resurrect', 3);
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIs2or3ButCellIsDead()
    {
        $this->assertAction('NullAction', 2, false);
        $this->assertAction('NullAction', 3, false);
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIsNot2Or3()
    {
        $this->assertAction('NullAction', 1);
        $this->assertAction('NullAction', 4);
    }
}
