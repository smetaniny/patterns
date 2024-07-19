<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects;

// Абстрактный класс графических элементов
abstract class GraphObject
{
    // Координата X
    protected int $x;
    // Координата Y
    protected int $y;

    // Конструктор
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    // Абстрактный метод для отображения объекта
    abstract public function draw();

    // Метод для клонирования объекта
    public function clone(): GraphObject
    {
        // Используем встроенную функцию clone для создания копии объекта
        return clone $this;
    }
}



