<?php

namespace GameOfLife;

/**
 * GameOfLife\Cell
 */
class Cell
{
    /**
     * @var bool
     */
    private $alive;

    /**
     * @var array
     */
    private $neighbours = array();

    /**
     * @param bool $isAlive
     */
    public function __construct($isAlive = true)
    {
        $this->alive = (boolean) $isAlive;
    }

    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->alive;
    }

    /**
     * @return self
     */
    public function kill()
    {
        $this->alive = false;

        return $this;
    }

    /**
     * @return self
     */
    public function resurrect()
    {
        $this->alive = true;

        return $this;
    }

    /**
     * @param Cell $neighbour
     *
     * @return self
     */
    public function addNeighbour(Cell $cell)
    {
        $this->neighbours[] = $cell;

        return $this;
    }

    /**
     * @return Cell[]
     */
    public function getNeighbours()
    {
        return $this->neighbours;
    }

    /**
     * @param array $neighbours
     *
     * @return self
     */
    public function setNeighbours(array $neighbours)
    {
        $this->neighbours = array();

        foreach ($neighbours as $neighbour) {
            $this->addNeighbour($neighbour);
        }

        return $this;
    }
}
