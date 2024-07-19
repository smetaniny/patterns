<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\Interface\ObserverInterface;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;
use JetBrains\PhpStorm\Pure;

// Класс окружности наследует абстрактный класс GraphObject и представляет собой графический объект в форме окружности.
class Circle extends GraphObject implements ObserverInterface
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


    public function drawColor()
    {
        echo "Цветная окружность с центром в ($this->x, $this->y) и радиусом $this->radius<br />";
    }

    public function drawBlackAndWhite()
    {
        echo "Черно-белая окружность с центром в ($this->x, $this->y) и радиусом $this->radius<br />";
    }
}
