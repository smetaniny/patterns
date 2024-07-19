<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Observer;

/**
 * Класс, представляющий собой таймер, который будет служить источником событий для наблюдателей.
 */
class ClockTimer extends Subject
{
    /**
     * Метод, который вызывается для "тика" таймера и уведомления наблюдателей.
     */
    public function tick()
    {
        // Уведомляем всех наблюдателей о "тике" таймера
        $this->notify();
    }

    /**
     * Метод для получения текущего часа.
     *
     * @return string Текущий час в формате строки.
     */
    public function getHour(): string
    {
        // Возвращает текущий час
        return date('H');
    }

    /**
     * Метод для получения текущей минуты.
     *
     * @return string Текущая минута в формате строки.
     */
    public function getMinute(): string
    {
        // Возвращает текущую минуту
        return date('i');
    }

    /**
     * Метод для получения текущей секунды.
     *
     * @return string Текущая секунда в формате строки.
     */
    public function getSecond(): string
    {
        // Возвращает текущую секунду
        return date('s');
    }
}
