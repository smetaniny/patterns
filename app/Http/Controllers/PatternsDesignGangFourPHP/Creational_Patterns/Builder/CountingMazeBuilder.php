<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Builder;

class CountingMazeBuilder extends MazeBuilder
{
    private $rooms;
    private $doors;

    public function __construct()
    {
        $this->rooms = 0;
        $this->doors = 0;
    }

    public function buildMaze()
    {
        // Not needed for counting maze builder
    }

    public function buildRoom(int $n)
    {
        $this->rooms++;
    }

    public function buildDoor(int $n1, int $n2)
    {
        $this->doors++;
    }

    public function addWall(int $n, int $direction)
    {
        // Not needed for counting maze builder
    }

    public function getCounts(): array
    {
        return [$this->rooms, $this->doors];
    }
}
