<?php

namespace GameOfLife\Action;

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
