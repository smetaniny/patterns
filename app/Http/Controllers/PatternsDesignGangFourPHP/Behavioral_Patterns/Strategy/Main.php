<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy;

class Main
{
    /**
     * Этот метод представляет собой точку входа для данного примера.
     */
    function index()
    {
        // Создаем композицию с простым композитором
        $quick = new Composition(new SimpleCompositor());
        // Создаем композицию с композитором TeX
        $slick = new Composition(new TeXCompositor());
        // Создаем композицию с массивным композитором и задаем интервал
        $iconic = new Composition(new ArrayCompositor(100));

        // Выполняем восстановление для композиции с простым композитором
        $quick->repair();
        // Выполняем восстановление для композиции с композитором TeX
        $slick->repair();
        // Выполняем восстановление для композиции с массивным композитором
        $iconic->repair();
    }
}
