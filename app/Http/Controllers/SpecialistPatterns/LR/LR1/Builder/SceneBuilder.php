<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Circle;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Line;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Point;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;
use JetBrains\PhpStorm\Pure;

// Класс SceneBuilder представляет собой строитель сцен для графических объектов.
class SceneBuilder
{
    private Scene $scene; // Приватное свойство для хранения сцены.

    // Конструктор класса, инициализирующий сцену.
    #[Pure] public function __construct()
    {
        $this->scene = new Scene();
    }

    // Метод для добавления точки на сцену с указанными координатами (x, y).
    public function addPoint(int $x, int $y): static
    {
        $point = Point::createAndAddToScene($this->scene, $x, $y);
        return $this;
    }

    // Метод для добавления линии на сцену с указанными координатами (x1, y1) и (x2, y2).
    public function addLine(int $x1, int $y1, int $x2, int $y2)
    {
        $line = Line::createAndAddToScene($this->scene, $x1, $y1, $x2, $y2);
        return $this;
    }

    // Метод для добавления окружности на сцену с указанными координатами (x, y) и радиусом.
    public function addCircle(int $x, int $y, int $radius)
    {
        $circle = Circle::createAndAddToScene($this->scene, $x, $y, $radius);
        return $this;
    }

    // Метод для построения сцены и возвращения ее.
    public function buildScene()
    {
        return $this->scene;
    }
}
