<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;


// Класс Point представляет собой графический объект - точку.
class Point extends GraphObject {
    private Coords $coords;

    public function __construct(int $x, int $y, string $color = self::DEFAULT_COLOR) {
        parent::__construct($color);
        $this->coords = new Coords($x, $y);
    }

    public function getX(): int {
        return $this->coords->getX();
    }

    public function setX(int $x): void {
        $this->coords->setX($x);
    }

    public function getY(): int {
        return $this->coords->getY();
    }

    public function setY(int $y): void {
        $this->coords->setY($y);
    }

    public function clone(): Point {
        return new Point($this->getX(), $this->getY(), $this->getColor());
    }

    public function draw(): void {
        echo "Point (" . $this->getX() . ", " . $this->getY() . ") " . $this->getColor() . "<br />";
    }
}

