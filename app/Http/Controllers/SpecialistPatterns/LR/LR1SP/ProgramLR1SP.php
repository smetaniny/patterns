<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP;

use App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph\ColorGOFactory;
use App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph\Scene;

class ProgramLR1SP
{
    public function index()
    {
        // Создаем фабрику для цветных объектов
        $gof = new ColorGOFactory();

        // Создаем красную и зеленую точки
        $gof->createPoint()->setColor("red");
        $gof->createPoint()->setColor("green");

        // Создаем синюю окружность
        $gof->createCircle()->setColor("blue");

        // Отображаем сцену
        Scene::getInstance()->draw();
    }
}
