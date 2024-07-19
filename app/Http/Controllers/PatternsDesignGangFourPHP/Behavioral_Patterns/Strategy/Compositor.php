<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy;

/**
 * Интерфейс Compositor определяет методы для композиции объектов.
 */
abstract class Compositor
{
    abstract public function compose($natural, $stretch, $shrink, $componentCount, $lineWidth, &$breaks);
}
