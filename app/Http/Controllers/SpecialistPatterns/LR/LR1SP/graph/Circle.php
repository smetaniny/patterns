<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;



// Класс Circle представляет собой графический объект "Окружность".
class Circle extends GraphObject {
    private Coords $center;
    private int $r;

    // Конструктор класса, создающий окружность с указанными координатами, радиусом и цветом.
    public function __construct(int $x, int $y, int $r, string $color = self::DEFAULT_COLOR) {
        parent::__construct($color);
        $this->center = new Coords($x, $y);
        $this->r = $r;
    }

    // Метод для получения радиуса окружности.
    public function getR(): int {
        return $this->r;
    }

    // Метод для установки радиуса окружности.
    public function setR(int $r): void {
        $this->r = $r;
    }

    // Метод для получения координаты X центра окружности.
    public function getX(): int {
        return $this->center->getX();
    }

    // Метод для установки координаты X центра окружности.
    public function setX(int $x): void {
        $this->center->setX($x);
    }

    // Метод для получения координаты Y центра окружности.
    public function getY(): int {
        return $this->center->getY();
    }

    // Метод для установки координаты Y центра окружности.
    public function setY(int $y): void {
        $this->center->setY($y);
    }

    // Метод для создания копии окружности.
    public function clone(): Circle {
        return new Circle($this->getX(), $this->getY(), $this->getR(), $this->getColor());
    }

    // Метод для отрисовки окружности.
    public function draw(): void {
        echo "Окружность (" . $this->getX() . ", " . $this->getY() . ") R: " . $this->getR() . " " . $this->getColor() . "<br />";
    }
}

?>
