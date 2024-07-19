<?php

namespace App\Http\Controllers\SpecialistPatterns\Prototype;

// Класс "Цветная точка", наследуется от класса "Точка"
class ColorPoint extends Point {
    private $color;

    // Конструктор класса, инициализирует координаты x и y, а также цвет.
    public function __construct($x, $y, $color) {
        parent::__construct($x, $y);
        $this->color = $color;
    }

    // Метод clone() создает и возвращает клон (копию) объекта цветной точки.
    public function clone() {
        return new ColorPoint($this->x, $this->y, $this->color);
    }

    // Переопределение метода __toString() для получения строкового представления объекта.
    public function __toString() {
        return "Color Point ({$this->x}, {$this->y}) {$this->color}";
    }
}
