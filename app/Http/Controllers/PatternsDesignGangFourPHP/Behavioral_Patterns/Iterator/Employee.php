<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

/**
 * Класс Employee представляет собой сущность сотрудника с именем.
 * Он содержит конструктор для установки имени сотрудника и метод для печати информации о сотруднике.
 */
class Employee
{
    /**
     * Имя сотрудника
     */
    private $name;

    /**
     * Конструктор класса Employee
     *
     * @param string $name Имя сотрудника
     */
    public function __construct(string $name)
    {
        // Установка имени сотрудника
        $this->name = $name;
    }

    /**
     * Метод для печати информации о сотруднике
     */
    public function printInfo(): void
    {
        // Вывод информации о сотруднике
        echo "Имя сотрудника: $this->name <br />";
    }
}
