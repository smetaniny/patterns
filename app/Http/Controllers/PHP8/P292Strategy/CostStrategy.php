<?php

namespace App\Http\Controllers\PHP8\Strategy292;

// Абстрактный класс CostStrategy, представляющий стратегию расчета стоимости.
abstract class CostStrategy
{
    // Абстрактный метод для расчета стоимости урока.
    abstract public function cost(Lesson $lesson): int;

    // Абстрактный метод для определения типа оплаты.
    abstract public function chargeType(): string;
}
