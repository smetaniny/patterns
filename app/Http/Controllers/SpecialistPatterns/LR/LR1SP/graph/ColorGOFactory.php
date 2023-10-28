<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;

// Класс ColorGOFactory представляет собой фабрику для создания цветных графических объектов.
class ColorGOFactory extends AbstractGOFactory
{
    private static ?Point $DEFAULT_POINT = null;

    public function __construct() {
        self::$DEFAULT_POINT = new Point(10, 20);
    }

    public function createPoint(): Point
    {
        $p = self::$DEFAULT_POINT->clone();
        Scene::getInstance()->add($p);
        return $p;
    }

    public function createCircle(): Circle
    {
        $c = new Circle(0, 0, 1);
        Scene::getInstance()->add($c);
        return $c;
    }

}

