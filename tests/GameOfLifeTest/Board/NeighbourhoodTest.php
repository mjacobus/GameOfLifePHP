<?php

namespace GameOfLifeTest\Board;

use PHPUnit_Framework_TestCase;
use GameOfLife\Board\Neighbourhood;

/**
 * GameOfLifeTest\Board\NeighbourhoodTest
 */
class NeighbourhoodTest extends PHPUnit_Framework_TestCase
{
    /** @var Neighbourhood */
    protected $hood;

    public function setUp()
    {
        $this->hood = new Neighbourhood(
            array(
                array(1,   2,  3,  4,  5,  6,  7,  8,  9, 10),
                array(11, 12, 13, 14, 15, 16, 17, 18, 19, 20),
                array(21, 22, 23, 24, 25, 26, 27, 28, 29, 30),
                array(31, 32, 33, 34, 35, 36, 37, 38, 39, 40),
                array(41, 42, 43, 44, 45, 46, 47, 48, 49, 50),
            )
        );
    }

    public function providerForGetNeighbours()
    {
        return array(
            array(1, array(2, 11, 12)),
            array(3, array(2, 4, 12, 13, 14)),
            array(10, array(9, 19, 20)),
            array(11, array(1, 2, 12, 21, 22)),
            array(23, array(12, 13, 14, 22, 24, 32, 33, 34)),
            array(30, array(19, 20, 29, 39, 40)),
            array(41, array(31, 32, 42)),
            array(50, array(39, 40, 49)),
        );
    }

    /**
     * @test
     * @dataProvider providerForGetNeighbours
     */
    public function testGetNeighbours($target, array $neighbours)
    {
        $this->assertEquals($neighbours, $this->hood->getNeighbours($target));
    }

    public function providerForGetResidentByAddress()
    {
        return array(
            array(1, 1, 1),
            array(1, 2, 2),
            array(5, 5, 45),
        );
    }

    /**
     * @test
     * @dataProvider providerForGetResidentByAddress
     */
    public function canGetNeighbourByCoordinates($line, $column, $expected)
    {
        $this->assertEquals($expected, $this->hood->getResidentByAddress($line, $column));
    }

    /**
     * @test
     * @dataProvider providerForGetResidentByAddress
     */
    public function canGetAddress($line, $column, $resident)
    {
        $expected = array($line, $column);
        $this->assertEquals($expected, $this->hood->getAddress($resident));
    }

    /**
     * @test
     */
    public function getResidents()
    {
        $expected = array();

        for ($i = 1; $i <= 50; $i++) {
            $expected[] = $i;
        }

        $this->assertEquals($expected, $this->hood->getResidents());
    }
}
