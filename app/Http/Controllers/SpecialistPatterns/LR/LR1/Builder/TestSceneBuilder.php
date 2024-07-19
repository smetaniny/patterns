<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Circle;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Line;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Point;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;
use JetBrains\PhpStorm\Pure;

class TestSceneBuilder
{
    private Scene $scene;

    #[Pure] public function __construct()
    {
        $this->scene = new Scene();
    }

    public function buildTestScene(): Scene
    {
        // Генерируйте тестовые данные и добавьте их в сцену
        $this->addTestObjects();
        return $this->scene;
    }

    private function addTestObjects()
    {
        // Добавьте тестовые объекты в сцену
        $point1 = Point::createAndAddToScene($this->scene, 1, 2);
        $point2 = Point::createAndAddToScene($this->scene, 3, 4);
        $line = Line::createAndAddToScene($this->scene, 5, 6, 7, 8);
        $circle = Circle::createAndAddToScene($this->scene, 9, 10, 11);

        // Дополнительные тестовые объекты могут быть добавлены сюда

        // Регистрируйте наблюдателей для объектов, если это необходимо
        $this->scene->registerObserver($point1);
        $this->scene->registerObserver($point2);
        $this->scene->registerObserver($line);
        $this->scene->registerObserver($circle);

        // Вызывайте методы обновления для объектов при необходимости
        $point1->update($point1);
        $point2->update($point2);
        $line->update($line);
        $circle->update($circle);
    }
}
