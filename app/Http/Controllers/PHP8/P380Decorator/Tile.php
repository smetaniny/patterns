<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

/**
 * Абстрактный класс Tile представляет собой абстрактную плитку (местность) в игровом контексте.
 * Этот класс определяет абстрактный метод getWealthFactor(), который должен быть реализован в подклассах.
 */
abstract class Tile
{
    /**
     * Абстрактный метод, который должен быть реализован в подклассах. Возвращает фактор богатства местности.
     *
     * @return int Фактор богатства
     */
    abstract public function getWealthFactor(): int;
}
