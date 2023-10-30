<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;

// Класс Point представляет собой графический объект - точку.
use JetBrains\PhpStorm\Pure;

class Point extends GraphObject {
    // Приватное свойство для хранения координат точки.
    private Coords $coords;

    // Конструктор класса. Инициализирует объект точки с заданными координатами и цветом.
    #[Pure] public function __construct(int $x, int $y, string $color = self::DEFAULT_COLOR) {
        // Вызов конструктора родительского класса GraphObject для инициализации цвета.
        parent::__construct($color);
        // Создание объекта Coords для хранения координат точки.
        $this->coords = new Coords($x, $y);
    }

    // Метод для получения координаты X точки.
    #[Pure] public function getX(): int {
        return $this->coords->getX();
    }

    // Метод для установки координаты X точки.
    public function setX(int $x): void {
        $this->coords->setX($x);
    }

    // Метод для получения координаты Y точки.
    #[Pure] public function getY(): int {
        return $this->coords->getY();
    }

    // Метод для установки координаты Y точки.
    public function setY(int $y): void {
        $this->coords->setY($y);
    }

    // Метод для создания копии точки.
    #[Pure] public function clone(): Point {
        return new Point($this->getX(), $this->getY(), $this->getColor());
    }

    // Метод для отрисовки точки.
    public function draw(): void {
        echo "Point (" . $this->getX() . ", " . $this->getY() . ") " . $this->getColor() . "<br />";
    }
}


