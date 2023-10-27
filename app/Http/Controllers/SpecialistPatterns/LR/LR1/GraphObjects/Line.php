<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\Interface\ObserverInterface;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;
use JetBrains\PhpStorm\Pure;

// Класс линии наследует абстрактный класс GraphObject и представляет собой графический объект в форме линии.
class Line extends GraphObject implements ObserverInterface
{
    // Координата X конечной точки линии
    private int $endX;
    // Координата Y конечной точки линии
    private int $endY;

    // Конструктор класса Line. Принимает координаты начальной и конечной точек линии.
    #[Pure] public function __construct(int $x, int $y, int $endX, int $endY)
    {
        parent::__construct($x, $y);
        $this->endX = $endX;
        $this->endY = $endY;
    }

    // Метод для отображения линии.
    public function draw()
    {
        echo "Линия от ($this->x, $this->y) до ($this->endX, $this->endY)<br />";
    }

    public static function createAndAddToScene(Scene $scene, int $x, int $y, int $endX, int $endY): Line
    {
        $line = new Line($x, $y, $endX, $endY);
        // Регистрация наблюдателя
        $scene->registerObserver($line);
        $scene->addObject($line);
        return $line;
    }


    public function update(GraphObject $object)
    {
        echo "Давление линии<br />";
    }

    public function drawColor()
    {
        echo "Цветная линия от ($this->x, $this->y) до ($this->endX, $this->endY)<br />";
    }

    public function drawBlackAndWhite()
    {
        echo "Черно-белая линия от ($this->x, $this->y) до ($this->endX, $this->endY)<br />";
    }
}

