<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

// Класс точки
class Point extends GraphObject implements Observer
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
}
