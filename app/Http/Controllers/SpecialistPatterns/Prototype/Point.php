<?php

namespace App\Http\Controllers\SpecialistPatterns\Prototype;

// Класс "Точка" представляет собой объект точки с координатами x и y.
class Point implements Prototype {
    protected $x;
    protected $y;

    // Конструктор класса, инициализирует координаты x и y.
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    // Метод clone() создает и возвращает клон (копию) объекта точки.
    public function clone() {
        return new Point($this->x, $this->y);
    }

    // Переопределение метода __toString() для получения строкового представления объекта.
    public function __toString() {
        return "Point ({$this->x}, {$this->y})";
    }
}
