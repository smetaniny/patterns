<?php

namespace App\Http\Controllers\PolymorphismStatic;

/**
 * Статический полиморфизм в PHP часто связан с перегрузкой методов в классе. Перегрузка методов позволяет определять
 * несколько методов с одним и тем же именем, но разным числом параметров.
 */
class PolymorphismStaticController
{
    public function index()
    {

        // Использование
        $result1 = MathUtility::add(2, 3);
        $result2 = MathUtility::addThree(2, 3, 5);

        echo "Result 1: $result1\n";  // Вывод: Result 1: 5
        echo "Result 2: $result2\n";  // Вывод: Result 2: 10
    }
}

