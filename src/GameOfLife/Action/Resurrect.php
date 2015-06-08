<?php

namespace GameOfLife\Action;

use GameOfLife\CellAwareTrait;

/**
 * GameOfLife\Action\Resurrect
 */
class Resurrect extends AbstractAction
{
    public function execute()
    {
        $this->getCell()->resurrect();
    }
}
