<?php

namespace App\Http\Controllers\Polymorphism\CompileTimePolymorphism;

class MathOperations
{
    public function addIntegers(int $a, int $b): int
    {
        return $a + $b;
    }

    public function addFloats(float $a, float $b): float
    {
        return $a + $b;
    }
}
