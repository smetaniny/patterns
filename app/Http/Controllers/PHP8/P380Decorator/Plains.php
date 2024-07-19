<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

/**
 * Класс Plains представляет собой конкретную реализацию плоской местности (плитки) в игровом контексте.
 * Этот класс наследуется от абстрактного класса Tile.
 */
class Plains extends Tile
{
    /**
     * @var int Фактор богатства, связанный с плоской местностью. Этот фактор используется в игровом контексте.
     */
    private int $wealthfactor = 2;

    /**
     * Возвращает фактор богатства для данной плоской местности.
     *
     * @return int Фактор богатства
     */
    public function getWealthFactor(): int
    {
        return $this->wealthfactor;
    }
}
