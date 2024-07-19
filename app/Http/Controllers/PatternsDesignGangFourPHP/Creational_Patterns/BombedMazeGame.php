<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\MazeGame;
use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Wall;

class BombedMazeGame extends MazeGame
{
    public function __construct()
    {
        echo "BombedMazeGame::BombedMazeGame()" . PHP_EOL;
    }

    public function makeWall(): Wall
    {
        return new BombedWall();
    }

    public function makeRoom(int $n): Room
    {
        return new RoomWithABomb($n);
    }
}

