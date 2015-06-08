<?php

namespace GameOfLife\Action;

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
