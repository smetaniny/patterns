<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class MazeFactory
{
    private static $instance = null;

    public function __construct()
    {
        echo "MazeFactory::MazeFactory()" . PHP_EOL;
    }

    public static function instance(): MazeFactory
    {
        if (is_null(self::$instance)) {
            $mazeStyle = getenv("MAZESTYLE");

            if ($mazeStyle === "bombed") {
                self::$instance = new BombedMazeFactory();
            } elseif ($mazeStyle === "enchanted") {
                self::$instance = new EnchantedMazeFactory();
            } else {
                self::$instance = new MazeFactory();
            }
        }
        return self::$instance;
    }

    public function makeMaze(): Maze
    {
        return new Maze();
    }

    public function makeWall(): Wall
    {
        return new Wall();
    }

    public function makeRoom(int $n): Room
    {
        return new Room($n);
    }

    public function makeDoor(Room $r1, Room $r2): Door
    {
        return new Door($r1, $r2);
    }
}
