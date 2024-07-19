<?php

namespace App\Http\Controllers\Polymorphism\CompileTimePolymorphism;

use JetBrains\PhpStorm\Pure;

class IntegerSum implements Summable
{
    private int $a;
    private int $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    #[Pure] public function add(): int
    {
        $math = new MathOperations();
        return $math->addIntegers($this->a, $this->b);
    }
}
