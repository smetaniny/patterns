<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

/**
 * Класс DiamondDecorator представляет собой конкретный декоратор, который расширяет функциональность плитки (местности).
 * Этот декоратор увеличивает фактор богатства местности на 2 единицы.
 */
class DiamondDecorator extends TileDecorator
{
    /**
     * Метод getWealthFactor() переопределен для увеличения фактора богатства местности на 2 единицы.
     *
     * @return int Фактор богатства местности с учетом декорации
     */
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() + 2;
    }
}
