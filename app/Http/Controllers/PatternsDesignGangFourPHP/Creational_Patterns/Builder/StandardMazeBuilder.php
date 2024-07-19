<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Builder;


use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Door;
use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Maze;
use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Room;
use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Wall;

class StandardMazeBuilder extends MazeBuilder
{
    protected $currentMaze;

    public function __construct()
    {
        $this->currentMaze = null;
    }

    public function buildMaze()
    {
        $this->currentMaze = new Maze();
    }

    public function getMaze(): ?Maze
    {
        return $this->currentMaze;
    }

    public function buildRoom(int $n)
    {
        if (!$this->currentMaze->roomNo($n)) {
            $room = new Room($n);
            $this->currentMaze->addRoom($room);

            $room->setSide(Direction::NORTH, new Wall());
            $room->setSide(Direction::SOUTH, new Wall());
            $room->setSide(Direction::EAST, new Wall());
            $room->setSide(Direction::WEST, new Wall());
        }
    }

    public function buildDoor(int $n1, int $n2)
    {
        $r1 = $this->currentMaze->roomNo($n1);
        $r2 = $this->currentMaze->roomNo($n2);
        $d = new Door($r1, $r2);

        $r1->setSide($this->commonWall($r1, $r2), $d);
        $r2->setSide($this->commonWall($r2, $r1), $d);
    }

    private function commonWall(Room $r1, Room $r2): Direction
    {
        if ($r1->getRoomNumber() < $r2->getRoomNumber()) {
            return Direction::EAST;
        } else {
            return Direction::WEST;
        }
    }
}
