<?php

namespace GameOfLife;

use GameOfLife\Board\Neighbourhood;

/**
 * GameOfLife\Board
 */
class Board
{
    /**
     * @param Cell[]
     */
    private $cells = array();

    /**
     * @param array[Cell[]]
     */
    public function __construct(array $cells)
    {
        $neighbourhood = new Neighbourhood($cells);
        $this->cells = $neighbourhood->getResidents();

        foreach ($this->getCells() as $cell) {
            $neighbours = $neighbourhood->getNeighbours($cell);
            $cell->setNeighbours($neighbours);
        }
    }

    /**
     * @param Cell[]
     */
    public function getCells()
    {
        return $this->cells;
    }
}
