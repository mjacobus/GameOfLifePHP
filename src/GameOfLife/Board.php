<?php

namespace GameOfLife;

use GameOfLife\Board\Neighbourhood;

/**
 * GameOfLife\Board
 */
class Board
{
    /**
     * @var [Cell[]]
     */
    private $cells = array();

    /**
     * @var Neighbourhood
     */
    private $neighbourhood;

    /**
     * @param array[Cell[]]
     */
    public function __construct(array $cells)
    {
        $neighbourhood = new Neighbourhood($cells);
        $this->neighbourhood = $neighbourhood;
        $this->cells = $cells;

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
        return $this->neighbourhood->getResidents();
    }

    /**
     * @return array[Cell[]]
     */
    public function toArray()
    {
        return $this->cells;
    }
}
