<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Structural_Patterns\Flyweight;

/**
 * Класс Font представляет шрифт.
 */
class Font {
    /**
     * @var string Название шрифта.
     */
    private string $name;

    /**
     * Конструктор класса Font.
     *
     * @param string $name Название шрифта.
     */
    public function __construct(string $name) {
        $this->name = $name;
    }
}

