<?php

namespace App\Http\Controllers\PHP8\P365Composite;

/**
 * Абстрактный класс Unit представляет базовую единицу компоновки.
 */
abstract class Unit
{
    public function getComposite(): ? CompositeUnit
    {
        return null;
    }

    /**
     * Абстрактный метод, который должен быть реализован в дочерних классах.
     * Возвращает силу бомбардировки данной единицы.
     *
     * @return int Сила бомбардировки данной единицы
     */
    abstract public function bombardStrength(): int;
}
