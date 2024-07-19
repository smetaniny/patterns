<?php

namespace App\Http\Controllers\Polymorphism\AdHocPolymorphism;

/**
 * Ад-хок полиморфизм, также известный как перегрузка операторов, может быть достигнут в PHP с использованием
 * магических методов. Давайте рассмотрим пример с оператором сложения (+):
 */
class ProgramAdHocPolymorphismController
{
    public function index()
    {

        // Создаем два вектора
        $vector1 = new Vector([1, 2, 3]);
        $vector2 = new Vector([4, 5, 6]);

        // Перегрузка оператора сложения
        $resultVector = $vector1->__add($vector2);

        // Вывод результата
        echo "Vector 1: $vector1<br />";
        echo "Vector 2: $vector2<br />";
        echo "Result: $resultVector<br />";
    }
}




