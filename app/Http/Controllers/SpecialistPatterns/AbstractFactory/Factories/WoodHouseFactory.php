<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Factories;

use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs\Roof;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs\WoodRoof;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls\Wall;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls\WoodWall;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows\Window;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows\WoodFrameWindow;
use JetBrains\PhpStorm\Pure;

// WoodHouseFactory - конкретная фабрика для создания компонентов деревянных домов.
class WoodHouseFactory implements HouseFactory
{

    // Метод создания стены, возвращает деревянную стену.
    #[Pure] public function createWall(): Wall
    {
        return new WoodWall();
    }

    // Метод создания крыши, возвращает крышу с деревянной отделкой.
    #[Pure] public function createRoof(): Roof
    {
        return new WoodRoof();
    }

    // Метод создания окна, возвращает окно с деревянной рамой.
    #[Pure] public function createWindow(): Window
    {
        return new WoodFrameWindow();
    }
}
