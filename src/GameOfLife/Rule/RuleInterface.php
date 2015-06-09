<?php

namespace GameOfLife\Rule;

use GameOfLife\Action\ActionInterface;
use GameOfLife\Cell;

/**
 * GameOfLife\Rule\RuleInterface
 */
interface RuleInterface
{
    /**
     * @param Cell $cell
     * @return ActionInterface
     */
    public function apply(Cell $cell);
}
