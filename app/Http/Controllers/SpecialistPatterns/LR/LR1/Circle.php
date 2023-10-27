<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

// Класс окружности наследует абстрактный класс GraphObject и представляет собой графический объект в форме окружности.
use JetBrains\PhpStorm\Pure;

class Circle extends GraphObject implements Observer
{
    // Радиус окружности
    private int $radius;

    // Конструктор класса Circle. Принимает координаты центра и радиус окружности.
    #[Pure] public function __construct(int $x, int $y, int $radius)
    {
        parent::__construct($x, $y);
        $this->radius = $radius;
    }

    // Метод для отображения окружности.
    public function draw()
    {
        echo "Окружность с центром в ($this->x, $this->y) и радиусом $this->radius<br />";
    }

    public static function createAndAddToScene(Scene $scene, int $x, int $y, int $radius): Circle
    {
        $circle = new Circle($x, $y, $radius);
        // Регистрация наблюдателя
        $scene->registerObserver($circle);
        $scene->addObject($circle);
        return $circle;
    }

    public function update(GraphObject $object)
    {
        echo "Давление окружности<br />";
    }
}
