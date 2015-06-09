<?php

namespace GameOfLife\Rule;

use GameOfLife\Cell;
use GameOfLife\Action;

/**
 * GameOfLife\Rule\LonelinessDeath
 */
class LonelinessDeath extends AbstractRule
{
    public function apply(Cell $cell)
    {
        if ($this->getNumberOfLivingNeighbours($cell) < 2) {
            return new Action\Kill($cell);
        }

        return new Action\Null($cell);
    }
}
