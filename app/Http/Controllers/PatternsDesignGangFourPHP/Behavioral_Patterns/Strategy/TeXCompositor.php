<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy;

/**
 * Класс TeXCompositor, наследующий от Compositor.
 */
class TeXCompositor extends Compositor
{
    /**
     * Конструктор класса TeXCompositor.
     */
    public function __construct()
    {
        // Выводим сообщение о создании экземпляра объекта TeXCompositor
        echo "Экземпляр объекта TeXCompositor успешно создан<br />";
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
        // Выводим сообщение о выполнении композиции в объекте TeXCompositor
        echo "Выполняется композиция в объекте TeXCompositor<br />";

        return 0;
    }
}
