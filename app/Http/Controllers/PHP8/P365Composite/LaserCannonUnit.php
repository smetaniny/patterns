<?php

namespace App\Http\Controllers\PHP8\P365Composite;

/**
 * Класс LaserCannonUnit представляет единицу вооружения - лазерное орудие.
 */
class LaserCannonUnit extends Unit
{
    /**
     * Возвращает силу бомбардировки лазерного орудия.
     *
     * @return int Сила бомбардировки лазерного орудия
     */
    public function bombardStrength(): int
    {
        // Фиксированная сила бомбардировки для лазерного орудия.
        return 44;
    }
}
