<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

/**
 * Класс PollutionDecorator представляет собой конкретный декоратор, который уменьшает фактор богатства местности.
 * Этот декоратор вычитает 4 из фактора богатства местности.
 */
class PollutionDecorator extends TileDecorator
{
    /**
     * Метод getWealthFactor() переопределен для уменьшения фактора богатства местности на 4 единицы по сравнению с базовой реализацией.
     *
     * @return int Фактор богатства местности с учетом декорации
     */
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() - 4;
    }
}
