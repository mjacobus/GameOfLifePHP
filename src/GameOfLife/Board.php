<?php

namespace GameOfLife;

use GameOfLife\Board\Neighbourhood;

/**
 * GameOfLife\Board
 */
class Board
{
    /**
     * @var array[Cell[]]
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
        $this->cells = $cells;
        $this->neighbourhood = new Neighbourhood($this->cells);

        foreach ($this->getCells() as $cell) {
            $neighbours = $this->neighbourhood->getNeighbours($cell);
            $cell->setNeighbours($neighbours);
        }
    }

    /**
     * @return Cell[]
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
