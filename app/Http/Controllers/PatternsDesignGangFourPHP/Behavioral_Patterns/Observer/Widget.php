<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Observer;

/**
 * Абстрактный класс виджета.
 */
abstract class Widget {
    /**
     * Абстрактный метод для отрисовки виджета
     *
     * @return mixed
     */
    abstract public function draw();
}
