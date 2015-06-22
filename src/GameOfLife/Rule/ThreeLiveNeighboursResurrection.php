<?php

namespace GameOfLife\Rule;

use GameOfLife\Cell;
use GameOfLife\Action;

/**
 * GameOfLife\Rule\ThreeLiveNeighboursResurrection
 */
class ThreeLiveNeighboursResurrection extends AbstractRule
{
    public function apply(Cell $cell)
    {
        $liveNeighbours = $this->getNumberOfLivingNeighbours($cell);

        if ($liveNeighbours === 3) {
            return new Action\Resurrect($cell);
        }

        return new Action\NullAction($cell);
    }
}
