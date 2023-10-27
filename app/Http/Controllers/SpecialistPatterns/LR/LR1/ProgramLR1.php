<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

class ProgramLR1
{
    public function index()
    {
        // Создание экземпляра сцены
        $scene = Scene::getInstance();

        // Создание точки и автоматическое добавление в сцену
        $point = Point::createAndAddToScene($scene, 1, 2);
        $point->update($point);

        // Создание линии и автоматическое добавление в сцену
        $line = Line::createAndAddToScene($scene, 3, 4, 5, 6);
        $line->update($line);

        // Создание окружности и автоматическое добавление в сцену
        $circle = Circle::createAndAddToScene($scene, 7, 8, 9);
        $circle->update($circle);

        // Отображение сцены
        $scene->render();
    }
}
