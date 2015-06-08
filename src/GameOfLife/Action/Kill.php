<?php

namespace GameOfLife\Action;

use GameOfLife\CellAwareTrait;

/**
 * GameOfLife\Action\Kill
 */
class Kill extends AbstractAction
{
    public function execute()
    {
        $this->getCell()->kill();
    }
}
