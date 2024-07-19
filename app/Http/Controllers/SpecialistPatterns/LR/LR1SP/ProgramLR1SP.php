<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP;

use App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph\ColorGOFactory;
use App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph\Scene;

/**
 * Используем фабрику для создания и отображения графических объектов на сцене.
 * Программа создает красные и зеленые точки, а также синюю окружность, добавляет их на сцену и
 * затем отображает сцену, вызывая метод draw() на объекте Scene.
 */
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
