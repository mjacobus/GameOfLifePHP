<?php

namespace GameOfLife\Test;

use GameOfLife\Cell;
use PHPUnit_Framework_TestCase;

class RuleTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @return \GameOfLife\Rule\RuleInterface
     */
    public function getRule()
    {
        throw new \Exception('Must implement method ' . __METHOD__);
    }

    /**
     * @test
     */
    public function implementsTheCorrectInterface()
    {
        $this->assertInstanceOf('GameOfLife\Rule\RuleInterface', $this->getRule());
    }

    /**
     * @param string $actionType
     * @param int    $numberOfAliveNeighbours
     * @param bool   $isAlive
     */
    protected function assertAction($actionType, $numberOfLiveCells, $isAlive = true)
    {
        $cell = $this->createCell($numberOfLiveCells, $isAlive);
        $actionClass = "GameOfLife\Action\\$actionType";
        $action = $this->getRule()->apply($cell);
        $this->assertInstanceOf($actionClass, $action);
        $this->assertEquals(new $actionClass($cell), $action);
    }

    /**
     * @param int  $numberOfAliveNeighbours
     * @param bool $isAlive
     *
     * @return Cell
     */
    public function createCell($numberOfAliveNeighbours, $isAlive = true)
    {
        $cell = new Cell($isAlive);

        for ($i = 1; $i <= $numberOfAliveNeighbours; $i++) {
            $cell->addNeighbour(new Cell(true));
        }

        return $cell;
    }
}
