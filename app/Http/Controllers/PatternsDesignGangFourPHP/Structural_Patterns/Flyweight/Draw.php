<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Structural_Patterns\Flyweight;

class Draw {
    // Статический метод для отрисовки глифа
    public static function render($window, $context) {
        echo "Draw::render(Window*, GlyphContext&)" . PHP_EOL;
    }
}
