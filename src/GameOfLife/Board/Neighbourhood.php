<?php

namespace GameOfLife\Board;

/**
 * GameOfLife\Board\Neighbourhood
 */
class Neighbourhood
{
    /**
     * @var array
     */
    private $neighbourhood = array();

    /**
     * @param array $neighbourhood
     */
    public function __construct(array $neighbourhood)
    {
        $this->neighbourhood = $neighbourhood;
    }

    /**
     * @param int $line
     * @param int $column
     *
     * @return mixed
     */
    private function getResidentByAddress($line, $column)
    {
        $line = $line - 1;
        $column = $column - 1;

        if ($this->addressExists($line, $column)) {
            return $this->neighbourhood[$line][$column];
        }
    }

    /**
     * @param int $xIndex
     * @param int $yIndex
     *
     * @return bool
     */
    private function addressExists($xIndex, $yIndex)
    {
        if (!array_key_exists($xIndex, $this->neighbourhood)) {
            return false;
        }

        if (!array_key_exists($yIndex, $this->neighbourhood[$xIndex])) {
            return false;
        }

        return true;
    }

    /**
     * @param mixed $targetedResident
     *
     * @return array|null
     */
    private function getAddress($targetedResident)
    {
        foreach ($this->neighbourhood as $xIndex => $lines) {
            foreach ($lines as $yIndex => $resident) {
                if ($targetedResident === $resident) {
                    return array($xIndex + 1, $yIndex + 1);
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getResidents()
    {
        $residents = array();

        foreach ($this->neighbourhood as $lines) {
            foreach ($lines as $resident) {
                $residents[] = $resident;
            }
        }

        return $residents;
    }

    /**
     * @param mixed $target
     *
     * @return array
     */
    public function getNeighbours($target)
    {
        $possibleAddresses = $this->getNeighboursAddresses($target);

        $neighbours = array();

        foreach ($possibleAddresses as $address) {
            $neighbour = $this->getResidentByAddress($address[0], $address[1]);

            if ($neighbour) {
                $neighbours[] = $neighbour;
            }
        }

        return $neighbours;
    }

    /**
     * @param mixed $target
     *
     * @return array
     */
    private function getNeighboursAddresses($target)
    {
        $address = $this->getAddress($target);
        $targetLine = $address[0];
        $targetColumn = $address[1];

        $possibleAddresses = array(
            // last line
            array($targetLine - 1, $targetColumn - 1),
            array($targetLine - 1, $targetColumn),
            array($targetLine - 1, $targetColumn + 1),
            // current line
            array($targetLine, $targetColumn - 1),
            array($targetLine, $targetColumn + 1),
            // next line
            array($targetLine + 1, $targetColumn - 1),
            array($targetLine + 1, $targetColumn),
            array($targetLine + 1, $targetColumn + 1),
        );

        return $possibleAddresses;
    }
}
