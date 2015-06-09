<?php

namespace GameOfLifeTest\Rule;

use GameOfLife\Rule\HappyCommunityResurrection;
use PHPUnit_Framework_TestCase;

/**
 * GameOfLifeTest\Rule\HappyCommunityResurrectionTest
 */
class HappyCommunityResurrectionTest extends PHPUnit_Framework_TestCase
{
    /** @var HappyCommunityResurrection */
    protected $rule;

    public function setUp()
    {
        $this->rule = new HappyCommunityResurrection();
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
    public function applyReturnRessurectActionWhenNumberOfNeighboursIs2or3()
    {
        $cell = createCell(2);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('GameOfLife\Action\Resurrect', $action);
        $this->assertSame($cell, $action->getCell());
        $this->assertInstanceOf(
            'GameOfLife\Action\Resurrect',
            $this->rule->apply(createCell(3))
        );
    }

    /**
     * @test
     */
    public function applyReturnNullActionWhenNumberOfNeighboursIsLessThan2()
    {
        $cell = createCell(4);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('GameOfLife\Action\Null', $action);
        $this->assertSame($cell, $action->getCell());
        $this->assertInstanceOf(
            'GameOfLife\Action\Null',
            $this->rule->apply(createCell(1))
        );
    }
}
