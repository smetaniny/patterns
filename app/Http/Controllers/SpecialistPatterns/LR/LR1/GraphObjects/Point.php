<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\Interface\ObserverInterface;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;

// Класс точки
class Point extends GraphObject implements ObserverInterface
{
    // Метод для отображения точки.
    public function draw()
    {
        echo "Точка с координатами ($this->x, $this->y)<br />";
    }

    public static function createAndAddToScene(Scene $scene, int $x, int $y): Point
    {
        $point = new Point($x, $y);
        // Регистрация наблюдателя
        $scene->registerObserver($point);
        $scene->addObject($point);
        return $point;
    }

    public function update(GraphObject $object)
    {
        echo "Давление точки<br />";
    }

    public function drawColor()
    {
        echo "Цветная точка с координатами ($this->x, $this->y)<br />";
    }

    public function drawBlackAndWhite()
    {
        echo "Черно-белая точка с координатами ($this->x, $this->y)<br />";
    }
}

