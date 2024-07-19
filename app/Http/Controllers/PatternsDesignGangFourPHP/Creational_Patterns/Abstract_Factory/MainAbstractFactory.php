<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\BombedMazeFactory;
use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\EnchantedMazeFactory;
use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\MazeGame;

class MainAbstractFactory
{
    function index() {
        // Создаем объект игры MazeGame
        $game = new MazeGame();

        // Создаем фабрику для создания лабиринтов с бомбами
        $factoryBombed = new BombedMazeFactory();

        // Создаем фабрику для создания зачарованных лабиринтов
        $factoryEnchanted = new EnchantedMazeFactory();

        // Создаем лабиринт с бомбами с помощью фабрики factoryBombed
        $game->createMaze($factoryBombed);

        // Создаем зачарованный лабиринт с помощью фабрики factoryEnchanted
        $game->createMaze($factoryEnchanted);

        // Возвращаем ноль, чтобы показать успешное завершение программы
        return 0;
    }
}
