<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;

// Класс Coords представляет координаты (x, y).
class Coords {
    private int $x;
    private int $y;

    public function __construct(int $x, int $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int {
        return $this->x;
    }

    public function setX(int $x): void {
        $this->x = $x;
    }

    public function getY(): int {
        return $this->y;
    }

    public function setY(int $y): void {
        $this->y = $y;
    }
}
