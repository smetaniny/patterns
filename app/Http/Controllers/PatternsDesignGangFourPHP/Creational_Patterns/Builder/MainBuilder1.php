<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Builder;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\MazeGame;

class MainBuilder1
{
    function index()
    {
        $mazeGame = new MazeGame();
        $builder = new StandardMazeBuilder();

        $mazeGame->createMaze($builder);
        $maze = $builder->getMaze();

        echo $maze . PHP_EOL;

    }

}
