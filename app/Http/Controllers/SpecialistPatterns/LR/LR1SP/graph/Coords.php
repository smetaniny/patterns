<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;

// Класс Coords представляет координаты (x, y).
class Coords {
    // Приватные свойства для хранения координат x и y.
    private int $x;
    private int $y;

    // Конструктор класса. Инициализирует объект координатами (x, y).
    public function __construct(int $x, int $y) {
        $this->x = $x;
        $this->y = $y;
    }

    // Метод для получения значения координаты x.
    public function getX(): int {
        return $this->x;
    }

    // Метод для установки значения координаты x.
    public function setX(int $x): void {
        $this->x = $x;
    }

    // Метод для получения значения координаты y.
    public function getY(): int {
        return $this->y;
    }

    // Метод для установки значения координаты y.
    public function setY(int $y): void {
        $this->y = $y;
    }
}
