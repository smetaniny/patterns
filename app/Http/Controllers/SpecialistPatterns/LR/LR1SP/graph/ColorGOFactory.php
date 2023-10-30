<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;

// Класс ColorGOFactory представляет собой фабрику для создания цветных графических объектов.
class ColorGOFactory extends AbstractGOFactory
{
    // Приватное статическое свойство для хранения значения по умолчанию для точки.
    private static ?Point $DEFAULT_POINT = null;

    // Конструктор класса. Устанавливает значение по умолчанию для точки.
    public function __construct() {
        self::$DEFAULT_POINT = new Point(10, 20);
    }

    // Метод для создания объекта класса Point.
    public function createPoint(): Point
    {
        // Клонируем точку из значения по умолчанию и добавляем ее в сцену.
        $p = self::$DEFAULT_POINT->clone();
        Scene::getInstance()->add($p);
        return $p;
    }

    // Метод для создания объекта класса Circle.
    public function createCircle(): Circle
    {
        // Создаем круг с начальными параметрами и добавляем его в сцену.
        $c = new Circle(0, 0, 1);
        Scene::getInstance()->add($c);
        return $c;
    }
}
