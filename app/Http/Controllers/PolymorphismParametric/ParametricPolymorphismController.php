<?php

namespace App\Http\Controllers\PolymorphismParametric;

/**
 * Параметрический полиморфизм
 */
class ParametricPolymorphismController
{
    /**
     * В приведенном примере Box - это обобщенный класс с типовым параметром T. Это позволяет создавать экземпляры
     * класса Box с различными типами данных.
     */
    public function index()
    {
        // Использование обобщенного класса с разными типами данных
        $stringBox = new Box("Hello, Generics!");
        $intBox = new Box(42);

        echo $stringBox->getValue() . "\n";  // Выводит: Hello, Generics!
        echo $intBox->getValue() . "\n";     // Выводит: 42
    }
}


