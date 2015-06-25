<?php

namespace GameOfLife;

use GameOfLife\Rule\HappyCommunityResurrection;
use GameOfLife\Rule\LonelinessDeath;
use GameOfLife\Rule\OverPopulationDeath;
use GameOfLife\Rule\RuleInterface;
use GameOfLife\Rule\ThreeLiveNeighboursResurrection;
use GameOfLife\Action\ActionInterface;

/**
 * GameOfLife\GenerationGenerator
 */
class GenerationGenerator
{
    /** @var Board */
    private $board;

    /** @var RuleInterface[] */
    private $rules;

    public function __construct(Board $board)
    {
        $this->board = $board;
        $this->rules = array(
            new HappyCommunityResurrection(),
            new LonelinessDeath(),
            new OverPopulationDeath(),
            new ThreeLiveNeighboursResurrection(),
        );
    }

    public function generate()
    {
        /** @var ActionInterface[] $actions */
        $actions = array();

        foreach ($this->board->getCells() as $cell) {
            foreach ($this->rules as $rule) {
                $actions[] = $rule->apply($cell);
            }
        }

        foreach ($actions as $action) {
            $action->execute();
        }
    }
}
