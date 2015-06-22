<?php

namespace GameOfLife\Rule;

use GameOfLife\Cell;
use GameOfLife\Action;

/**
 * GameOfLife\Rule\HappyCommunityResurrection
 */
class HappyCommunityResurrection extends AbstractRule
{
    public function apply(Cell $cell)
    {
        $liveNeighbours = $this->getNumberOfLivingNeighbours($cell);

        if (in_array($liveNeighbours, array(2, 3))) {
            return new Action\Resurrect($cell);
        }

        return new Action\NullAction($cell);
    }
}
