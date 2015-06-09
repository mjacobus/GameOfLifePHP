<?php

namespace GameOfLife\Rule;

use GameOfLife\Cell;

/**
 * GameOfLife\Rule\AbstractRule
 */
abstract class AbstractRule implements RuleInterface
{
    abstract public function apply(Cell $cell);

    /**
     * @param Cell $cell
     *
     * @return int
     */
    public function getNumberOfLivingNeighbours(Cell $cell)
    {
        $total = 0;

        foreach ($cell->getNeighbours() as $neighbour) {
            if ($neighbour->isAlive()) {
                $total += 1;
            }
        }

        return $total;
    }
}
