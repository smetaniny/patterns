<?php

namespace App\Http\Controllers\PHP8\P426Visitor;

/**
 * Класс Archer представляет стрелка, который является одной из единиц армии.
 */
class Archer extends Unit
{
    /**
     * Возвращает силу бомбардировки стрелка.
     *
     * @return int Сила бомбардировки стрелка
     */
    public function bombardStrength(): int
    {
        // Фиксированная сила бомбардировки для стрелка.
        return 4;
    }
}
