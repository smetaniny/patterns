<?php

namespace App\Http\Controllers\PHP8\P299Notifier;

// Импорт необходимых классов
use App\Http\Controllers\PHP8\P292Strategy\FixedCostStrategy;
use App\Http\Controllers\PHP8\P292Strategy\Lecture;
use App\Http\Controllers\PHP8\P292Strategy\Seminar;
use App\Http\Controllers\PHP8\P292Strategy\TimedCostStrategy;

/**
 * Код демонстрирует пример использования паттерна "Стратегия" и паттерна "Фабричный метод" в
 * контексте управления регистрацией уроков.
 */
class ProgramP299Notifier
{
    public function index()
    {
        // Создание объекта семинара (урок 1) с параметрами: продолжительность (4 часа), стратегия стоимости (TimedCostStrategy), название урока.
        $lessons1 = new Seminar(4, new TimedCostStrategy(), "Физика в действии");

        // Создание объекта лекции (урок 2) с параметрами: продолжительность (7 часов), стратегия стоимости (FixedCostStrategy), имя лектора.
        $lessons2 = new Lecture(7, new FixedCostStrategy(), "Карпов Станислав Викторович");

        // Создание объекта управления регистрацией уроков.
        $mgr = new RegistrationMgr();

        // Регистрация урока 1 (семинара).
        $mgr->register($lessons1);

        // Регистрация урока 2 (лекции).
        $mgr->register($lessons2);
    }
}
