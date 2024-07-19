<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Builder;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\MazeGame;

class MainBuilder2
{
    function index() {

        $mazeGame = new MazeGame();
        $builder = new CountingMazeBuilder();

        $mazeGame->createMaze($builder);
        [$rooms, $doors] = $builder->getCounts();

        echo "The maze has $rooms rooms and $doors doors" . PHP_EOL;

        }

}
