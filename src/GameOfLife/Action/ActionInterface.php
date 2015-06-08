<?php

namespace GameOfLife\Action;

use GameOfLife\Cell;

/**
 * GameOfLife\Action\ActionInterface
 */
interface ActionInterface
{
    public function execute();

    /**
     * @return Cell
     */
    public function getCell();
}
