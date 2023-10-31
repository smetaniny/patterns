<?php

namespace App\Http\Controllers\PHP8\P308Employee;

/**
 * Пример демонстрирует работу с абстрактными типами и полиморфизмом, где различные типы сотрудников могут реагировать
 * на события (например, неудачу проекта) по-разному. Это дает гибкость в управлении сотрудниками и их поведением в
 * разных ситуациях.
 */
class ProgramP308Employee
{
    public function index()
    {
        // Создаем экземпляр "NastyBoss" (злобного босса).
        $boss = new NastyBoss();

        // Нанимаем сотрудников и добавляем их к боссу.
        $boss->addEmployee(Employee::recruit("Игорь"));
        $boss->addEmployee(Employee::recruit("Владимир"));
        $boss->addEmployee(Employee::recruit("Мария"));

        // Запускаем несколько неудачных проектов.
        $boss->projectFails();
        $boss->projectFails();
        $boss->projectFails();
    }
}
