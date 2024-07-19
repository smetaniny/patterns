<?php

namespace App\Http\Controllers\PHP8\P443NullObject;

use App\Http\Controllers\PHP8\P426Visitor\Unit;

// Класс NullUnit (Пустой объект) является наследником класса Unit
class NullUnit extends Unit
{
    // Метод bombardStrength() возвращает нулевую силу удара
    public function bombardStrength(): int
    {
        return 0;
    }

    // Метод getHealth() возвращает нулевое значение для здоровья
    public function getHealth(): int
    {
        return 0;
    }

    // Метод getDepth() возвращает нулевое значение для глубины (по вашему контексту)
    public function getDepth(): int
    {
        return 0;
    }
}
