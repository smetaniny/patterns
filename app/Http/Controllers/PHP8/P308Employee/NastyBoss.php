<?php

namespace App\Http\Controllers\PHP8\P308Employee;

// Класс NastyBoss
class NastyBoss
{
    // Закрытое свойство employees, представляющее собой массив сотрудников
    private array $employees = [];

    // Метод addEmployee, который добавляет сотрудника в массив
    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    // Метод projectFails, который проверяет наличие сотрудников в массиве и увольняет последнего
    public function projectFails(): void
    {
        if (count($this->employees) > 0) {
            // Увольнение сотрудника
            $emp = array_pop($this->employees);
            // Вызывает метод fire() у последнего сотрудника
            $emp->fire();
        }
    }
}
