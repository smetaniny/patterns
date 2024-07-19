<?php

namespace App\Http\Controllers\Polymorphism\CompileTimePolymorphism;

/**
 * Пример использования контрактов и параметризованных типов
 */
interface Summable
{
    public function add(): int|float;
}
