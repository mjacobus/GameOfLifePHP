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
    public function applyReturnRessurectActionWhenNumberOfNeighboursIs2or3()
    {
        $this->assertAction('Resurrect', 2);
        $this->assertAction('Resurrect', 3);
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIsNot2Or3()
    {
        $this->assertAction('Null', 1);
        $this->assertAction('Null', 4);
    }
}
