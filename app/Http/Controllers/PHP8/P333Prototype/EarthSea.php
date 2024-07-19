<?php

namespace App\Http\Controllers\PHP8\P333Prototype;

// Этот класс представляет морские местности на Земле, наследует функциональность класса Sea.
class EarthSea extends Sea
{
    public function __construct(private int $navigability)
    {
    }
}
