<?php

namespace GameOfLifeTest\Rule;

use PHPUnit_Framework_TestCase;
use GameOfLife\Rule\ThreeLiveNeighboursResurrection;

/**
 * GameOfLifeTest\Rule\ThreeLiveNeighboursResurrectionTest
 */
class ThreeLiveNeighboursResurrectionTest extends PHPUnit_Framework_TestCase
{
    /** @var ThreeLiveNeighboursResurrection */
    protected $rule;

    public function setUp()
    {
        $this->rule = new ThreeLiveNeighboursResurrection();
    }

    /**
     * @test
     */
    public function applyReturnRessurectActionWhenNumberOfNeighboursIs2or3()
    {
        $cell = createCell(3);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('GameOfLife\Action\Resurrect', $action);
        $this->assertSame($cell, $action->getCell());
    }

    /**
     * @test
     */
    public function applyReturnsNullActionWhenCellDoesNotHave3LiveNeighbours()
    {
        $this->assertInstanceOf(
            'GameOfLife\Action\Null',
            $this->rule->apply(createCell(2))
        );

        $this->assertInstanceOf(
            'GameOfLife\Action\Null',
            $this->rule->apply(createCell(1))
        );

        $this->assertInstanceOf(
            'GameOfLife\Action\Null',
            $this->rule->apply(createCell(4))
        );
    }
}
