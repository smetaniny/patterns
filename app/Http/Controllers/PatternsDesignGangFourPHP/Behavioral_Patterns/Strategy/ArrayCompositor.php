<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy;

/**
 * Класс ArrayCompositor, наследующий от Compositor.
 */
class ArrayCompositor extends Compositor
{
    /**
     * Интервал композитора массива.
     */
    protected int $interval;

    /**
     * Конструктор класса ArrayCompositor.
     *
     * @param int $interval Интервал композитора массива.
     */
    public function __construct(int $interval)
    {
        // Выводим сообщение о создании экземпляра объекта ArrayCompositor
        echo "Экземпляр объекта ArrayCompositor успешно создан<br />";

        // Устанавливаем интервал композитора массива
        $this->interval = $interval;
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
        // Выводим сообщение о выполнении композиции в объекте ArrayCompositor
        echo "Выполняется композиция в объекте ArrayCompositor<br />";

        return 0;
    }
}
