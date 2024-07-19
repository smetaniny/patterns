<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Structural_Patterns\Flyweight;


class GlyphContext {
    private int $index;
    private BTree $fonts;

    public function __construct() {
        $this->index = 0;
        $this->fonts = new BTree(); // Предположим, что BTree - это класс, который вам нужно создать
    }

    public function next($step = 1) {
        $this->index += $step;
    }

    public function insert($quantity = 1) {
        // Логика вставки, если необходимо
    }

    public function getFont() {
        // Логика получения шрифта, если необходимо
        return new Font();
    }

    public function setFont(Font $font, int $span = 1) {
        // Логика установки шрифта, если необходимо
    }
}
