<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy;

/**
 * Простой композитор, который наследуется от класса Compositor.
 */
class SimpleCompositor extends Compositor
{
    /**
     * Конструктор класса SimpleCompositor.
     */
    public function __construct()
    {
        // Выводим сообщение о создании экземпляра объекта SimpleCompositor
        echo "Экземпляр объекта SimpleCompositor успешно создан<br />";
    }

    /**
     * Метод композиции объектов.
     *
     * @param $natural
     * @param $stretch
     * @param $shrink
     * @param $componentCount
     * @param $lineWidth
     * @param $breaks
     *
     * @return int
     */
    public function compose($natural, $stretch, $shrink, $componentCount, $lineWidth, &$breaks): int
    {
        // Выводим сообщение о выполнении композиции в объекте SimpleCompositor
        echo "Выполняется композиция в объекте SimpleCompositor<br />";

        return 0;
    }
}
