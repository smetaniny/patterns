<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Builder;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Maze;

class MazeBuilder {
    // Виртуальные методы для построения лабиринта
    public function BuildMaze() {}
    public function BuildRoom(int $room) {}
    public function BuildDoor(int $roomFrom, int $roomTo) {}

    // Метод для получения готового лабиринта
    public function GetMaze(): ?Maze {
        return null;
    }

    // Защита от повторного включения файла
    protected function __construct() {}
}

?>
