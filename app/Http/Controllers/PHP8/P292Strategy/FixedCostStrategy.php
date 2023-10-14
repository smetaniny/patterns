<?php

namespace App\Http\Controllers\PHP8\P292Strategy;

// Класс FixedCostStrategy, который наследует абстрактный класс CostStrategy.
class FixedCostStrategy extends CostStrategy
{
    // Реализация метода cost для расчета стоимости урока с фиксированной ставкой.
    public function cost(Lesson $lesson): int
    {
        return 30000;
    }

    // Реализация метода chargeType для определения типа оплаты (фиксированная ставка).
    public function chargeType(): string
    {
        return "Фиксированная ставка";
    }
}
