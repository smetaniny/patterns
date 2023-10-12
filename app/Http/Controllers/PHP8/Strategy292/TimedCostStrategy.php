<?php

namespace App\Http\Controllers\PHP8\Strategy292;

use JetBrains\PhpStorm\Pure;

// Класс TimedCostStrategy, наследующий абстрактный класс CostStrategy.
class TimedCostStrategy extends CostStrategy
{
    // Реализация метода cost для расчета стоимости урока с почасовой оплатой.
    #[Pure] public function cost(Lesson $lesson): int
    {
        return ($lesson->getDuration() * 5);
    }

    // Реализация метода chargeType для определения типа оплаты (почасовая оплата).
    public function chargeType(): string
    {
        return "Почасовая оплата";
    }
}
