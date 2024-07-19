<?php

namespace App\Http\Controllers\Polymorphism\CompileTimePolymorphism;

use JetBrains\PhpStorm\Pure;

class FloatSum implements Summable
{
    private float $a;
    private float $b;

    public function __construct(float $a, float $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    #[Pure] public function add(): float
    {
        $math = new MathOperations();
        return $math->addFloats($this->a, $this->b);
    }
}
