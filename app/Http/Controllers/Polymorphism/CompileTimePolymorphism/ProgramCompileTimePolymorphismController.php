<?php

namespace App\Http\Controllers\Polymorphism\CompileTimePolymorphism;

/**
 * Полиморфизм времени компиляции (Compile-Time Polymorphism):
 */
class ProgramCompileTimePolymorphismController
{
    /**
     * В этом примере, интерфейс Summable содержит метод add, который возвращает результат сложения. Затем есть две
     * конкретные реализации этого интерфейса: IntegerSum и FloatSum. Каждая из них использует объект MathOperations
     * для выполнения сложения, но с разными типами данных.
     *
     * При вызове метода add на объектах IntegerSum и FloatSum, PHP статически определяет, какой метод add
     * использовать, исходя из типа объекта, что и является примером статического полиморфизма.
     *
     */
    public function index()
    {
        // Использование
        $integerSum = new IntegerSum(5, 3);
        $floatSum = new FloatSum(2.5, 3.7);

        echo "Сумма целых чисел: " . $integerSum->add() . "<br />";
        echo "Сумма чисел с плавающей точкой: " . $floatSum->add() . "<br />";
    }
}




