<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Factories;

use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs\Roof;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs\TileRoof;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls\BrickWall;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls\Wall;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows\PlasticFrameWindow;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows\Window;
use JetBrains\PhpStorm\Pure;

// StoneHouseFactory - конкретная фабрика для создания компонентов каменных домов.
class StoneHouseFactory implements HouseFactory
{

    // Метод создания стены, возвращает каменную стену.
    #[Pure] public function createWall(): Wall
    {
        return new BrickWall();
    }

    // Метод создания крыши, возвращает крышу с керамической черепицей.
    #[Pure] public function createRoof(): Roof
    {
        return new TileRoof();
    }

    // Метод создания окна, возвращает окно с пластиковой рамой.
    #[Pure] public function createWindow(): Window
    {
        return new PlasticFrameWindow();
    }
}
