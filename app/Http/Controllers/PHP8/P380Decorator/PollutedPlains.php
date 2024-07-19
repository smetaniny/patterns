<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

/**
 * Класс PollutedPlains представляет собой конкретную реализацию декорированной плоской местности в игровом контексте.
 * Этот класс наследуется от класса Plains и уменьшает фактор богатства местности на 4 единицы.
 */
class PollutedPlains extends Plains
{
    /**
     * Переопределенный метод getWealthFactor() уменьшает фактор богатства местности на 4 единицы по сравнению с базовой реализацией.
     *
     * @return int Фактор богатства декорированной местности
     */
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() - 4;
    }
}
