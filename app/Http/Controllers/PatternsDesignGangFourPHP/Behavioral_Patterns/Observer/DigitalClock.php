<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Observer;

/**
 * Класс, представляющий цифровые часы, которые являются наблюдателями таймера.
 */
class DigitalClock extends Widget implements Observer
{
    // Объект таймера
    private ClockTimer $subject;

    /**
     * Конструктор класса.
     *
     * @param ClockTimer $s Объект таймера.
     */
    public function __construct(ClockTimer $s)
    {
        // Устанавливаем объект таймера
        $this->subject = $s;
        // Присоединяем себя к таймеру в качестве наблюдателя
        $this->subject->attach($this);
    }

    /**
     * Деструктор класса.
     */
    public function __destruct()
    {
        // Отсоединяем себя от таймера
        $this->subject->detach($this);
    }

    /**
     * Метод обновления, вызываемый при изменении состояния таймера.
     *
     * @param Subject $theChangedSubject Измененный объект-субъект.
     */
    public function update(Subject $theChangedSubject)
    {
        // Проверяем, является ли измененный объект тем же самым таймером
        if ($theChangedSubject === $this->subject) {
            // Если да, перерисовываем цифровые часы
            $this->draw();
        }
    }

    /**
     * Метод отрисовки цифровых часов.
     */
    public function draw()
    {
        // Получаем текущий час
        $hour = $this->subject->getHour();
        // Получаем текущую минуту
        $minute = $this->subject->getMinute();
        // Получаем текущую секунду
        $second = $this->subject->getSecond();

        // Выводим время в формате "час:минута:секунда"
        echo "$hour:$minute:$second<br />";
    }
}
