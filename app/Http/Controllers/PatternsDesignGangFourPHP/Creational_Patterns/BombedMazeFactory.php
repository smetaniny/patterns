<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;



use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Wall;

class BombedMazeFactory implements MazeFactory
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

?>
