<?php

namespace GameOfLife\Action;

use GameOfLife\Cell;

/**
 * GameOfLife\Action\AbstractAction
 */
abstract class AbstractAction implements ActionInterface
{
    /**
     * @param Cell
     */
    private $cell;

    /**
     * @param Cell $cell
     */
    public function __construct(Cell $cell)
    {
        $this->cell = $cell;
    }

    public function execute()
    {

    }

    public function getCell()
    {
        return $this->cell;
    }
}
