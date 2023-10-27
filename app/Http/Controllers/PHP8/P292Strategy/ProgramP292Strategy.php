<?php

namespace App\Http\Controllers\PHP8\P292Strategy;

class ProgramP292Strategy
{
    public function index() {
        $lessons[] = new Seminar(4, new TimedCostStrategy(), "Цветы");
        $lessons[] = new Lecture(7, new FixedCostStrategy(), "Фамин Иван Иваныч");
        foreach ($lessons as $lesson) {
            echo "Оплата за занятие {$lesson->cost()}. <br/>";
            echo "Тип оплаты: {$lesson->chargeType()} <br/>";
            echo "Длительность урока: {$lesson->getDuration()} <br/>";

            // Добавляем этот блок для семинаров
            if ($lesson instanceof Seminar) {
                echo "Тема семинара: {$lesson->getTopic()} <br/>";
            }

            if ($lesson instanceof Lecture) {
                echo "Лектор: {$lesson->getRector()} <br/>";
            }
            echo "<hr/>\n";
        }
    }
}
