<?php

namespace App\Http\Controllers\Polymorphism\AdHocPolymorphism;

use JetBrains\PhpStorm\Pure;

class Vector
{
    private array $elements;

    // Конструктор класса, принимающий массив элементов вектора
    public function __construct(array $elements)
    {
        // Инициализация приватного свойства $elements переданным массивом
        $this->elements = $elements;
    }

    // Магический метод для перегрузки оператора сложения
    #[Pure] public function __add(Vector $otherVector): Vector
    {
        // Создание массива для хранения результата сложения
        $result = [];

        // Перегрузка оператора сложения для каждого элемента вектора
        for ($i = 0; $i < count($this->elements); $i++) {
            // Сложение соответствующих элементов текущего и переданного векторов
            $result[$i] = $this->elements[$i] + $otherVector->elements[$i];
        }

        // Создание и возвращение нового объекта Vector с результатом сложения
        return new Vector($result);
    }

    // Магический метод для приведения объекта к строке
    public function __toString()
    {
        // Возврат строки, представляющей вектор в виде "[элемент1, элемент2, ...]"
        return '[' . implode(', ', $this->elements) . ']';
    }
}
