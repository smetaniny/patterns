<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;

// Абстрактный класс GraphObject представляет собой абстрактный графический объект.
abstract class GraphObject
{
    // Константа для хранения цвета по умолчанию.
    public const DEFAULT_COLOR = "black";
    // Приватное свойство для хранения цвета объекта.
    private string $color;

    // Конструктор класса. Инициализирует объект заданным цветом, либо цветом по умолчанию.
    public function __construct(string $color = self::DEFAULT_COLOR)
    {
        $this->color = $color;
    }

    // Метод для получения цвета объекта.
    public function getColor(): string
    {
        return $this->color;
    }

    // Метод для установки цвета объекта.
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    // Абстрактный метод для отрисовки объекта, который должен быть реализован в подклассах.
    abstract public function draw(): void;

    // Метод для создания копии объекта.
    public function clone(): self
    {
        // Создаем новый объект того же класса и копируем значения свойств, включая цвет.
        $newObject = new static($this->color);
        // Можно добавить дополнительные операции копирования свойств, если необходимо.
        // $newObject->someProperty = $this->someProperty;
        return $newObject;
    }
}


