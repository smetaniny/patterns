<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Observer;

/**
 * Основной класс для реализации паттерна Наблюдатель.
 */
class MainObserver
{
    function index()
    {
        // Создаем экземпляр объекта-таймера
        $timer = new ClockTimer();

        // Создаем цифровые часы, которые будут наблюдать за таймером
       new DigitalClock($timer);

        // Симулируем тики таймера
        for ($i = 0; $i < 10; $i++) {
            // "Тикаем" таймером
            $timer->tick();

            // Задержка между "тиками" - 1 секунда
            sleep(1);
        }
    }
}
