<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class BombedMazeFactory extends MazeFactory
{
    public function makeWall(): Wall
    {
        return new BombedWall();
    }

    public function makeRoom(int $n): Room
    {
        return new RoomWithABomb($n);
    }
}
