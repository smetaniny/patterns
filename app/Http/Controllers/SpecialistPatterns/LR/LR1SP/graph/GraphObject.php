<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;


// Абстрактный класс GraphObject представляет собой абстрактный графический объект.
abstract class GraphObject
{
    public const DEFAULT_COLOR = "black";
    private string $color;

    public function __construct(string $color = self::DEFAULT_COLOR)
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    abstract public function draw(): void;

    public function clone(): self
    {
        // Создаем новый объект того же класса и копируем значения свойств
        $newObject = new static($this->color);
        // Дополнительные операции копирования свойств, если необходимо
        // $newObject->someProperty = $this->someProperty;
        return $newObject;
    }
}

