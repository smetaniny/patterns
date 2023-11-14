<?php

namespace App\Http\Controllers\PolymorphismStatic;

class MathUtility
{
    public static function add($a, $b)
    {
        return $a + $b;
    }

    public static function addThree($a, $b, $c)
    {
        return $a + $b + $c;
    }
}
