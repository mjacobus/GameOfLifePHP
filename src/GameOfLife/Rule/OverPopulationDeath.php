<?php

namespace GameOfLife\Rule;

use GameOfLife\Cell;
use GameOfLife\Action;

/**
 * GameOfLife\Rule\OverPopulationDeath
 */
class OverPopulationDeath extends AbstractRule
{
    public function apply(Cell $cell)
    {
        if ($this->getNumberOfLivingNeighbours($cell) > 3) {
            return new Action\Kill($cell);
        }

        return new Action\NullAction($cell);
    }
}
