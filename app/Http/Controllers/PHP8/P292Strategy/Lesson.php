<?php

namespace App\Http\Controllers\PHP8\Strategy292;

// Абстрактный класс "Lesson"
abstract class Lesson
{
    // Конструктор класса, принимающий два приватных свойства: "duration" (длительность) и "costStrategy" (стратегия стоимости).
    // UML Композиция от класса CostStrategy
    public function __construct(
        private int          $duration,
        private CostStrategy $costStrategy
    )
    {
        // Конструктор пустой, так как он только инициализирует свойства.
    }

    // Метод "cost", который возвращает стоимость урока, используя стратегию стоимости, определенную в "costStrategy".
    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    // Метод "chargeType", который возвращает тип оплаты, используя стратегию стоимости, определенную в "costStrategy".
    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    // Метод "getDuration", который возвращает длительность урока.
    public function getDuration(): int
    {
        return $this->duration;
    }
}
